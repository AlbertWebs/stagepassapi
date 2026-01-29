<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AdminSectionController extends Controller
{
    public function index(string $sectionKey)
    {
        $section = $this->getSectionConfig($sectionKey);
        $tables = collect($section['tables'])
            ->map(function (array $table) {
                $tableName = $table['name'];
                $columns = Schema::getColumnListing($tableName);
                $inputColumns = array_values(array_filter($columns, function (string $column) {
                    return !in_array($column, ['id', 'created_at', 'updated_at'], true);
                }));
                $columnTypes = collect($inputColumns)
                    ->mapWithKeys(function (string $column) use ($tableName) {
                        return [$column => Schema::getColumnType($tableName, $column)];
                    })
                    ->all();
                $query = DB::table($tableName);
                if (Schema::hasColumn($tableName, 'sort_order')) {
                    $query->orderBy('sort_order');
                } else {
                    $query->orderBy('id');
                }

                return array_merge($table, [
                    'columns' => $columns,
                    'input_columns' => $inputColumns,
                    'column_types' => $columnTypes,
                    'records' => $query->get(),
                ]);
            })
            ->all();

        return view('admin.section-index', [
            'sectionKey' => $sectionKey,
            'sectionLabel' => $section['label'] ?? Str::headline($sectionKey),
            'tables' => $tables,
        ]);
    }

    public function store(Request $request, string $sectionKey, string $table): RedirectResponse
    {
        $tableConfig = $this->getTableConfig($sectionKey, $table);
        if (!empty($tableConfig['no_create'])) {
            abort(403);
        }

        $columns = $this->getInputColumns($table);
        $payload = $this->extractPayload($request, $columns, $table);

        if (!empty($tableConfig['single'])) {
            $existingId = DB::table($table)->orderBy('id')->value('id');
            if ($existingId) {
                $this->touchUpdate($table, $payload);
                DB::table($table)->where('id', $existingId)->update($payload);
            } else {
                $this->touchInsert($table, $payload);
                DB::table($table)->insert($payload);
            }
        } else {
            $this->touchInsert($table, $payload);
            DB::table($table)->insert($payload);
        }

        return back()->with('status', 'Saved successfully.');
    }

    public function update(Request $request, string $sectionKey, string $table, int $id): RedirectResponse
    {
        $tableConfig = $this->getTableConfig($sectionKey, $table);
        if (!empty($tableConfig['no_update'])) {
            abort(403);
        }

        $columns = $this->getInputColumns($table);
        $payload = $this->extractPayload($request, $columns, $table);
        $this->touchUpdate($table, $payload);

        DB::table($table)->where('id', $id)->update($payload);

        return back()->with('status', 'Updated successfully.');
    }

    public function destroy(string $sectionKey, string $table, int $id): RedirectResponse
    {
        $this->getTableConfig($sectionKey, $table);

        DB::table($table)->where('id', $id)->delete();

        return back()->with('status', 'Deleted successfully.');
    }

    private function getSectionConfig(string $sectionKey): array
    {
        $sections = config('admin_sections.sections', []);
        if (!isset($sections[$sectionKey])) {
            abort(404);
        }

        return $sections[$sectionKey];
    }

    private function getTableConfig(string $sectionKey, string $table): array
    {
        $section = $this->getSectionConfig($sectionKey);
        foreach ($section['tables'] as $tableConfig) {
            if (($tableConfig['name'] ?? null) === $table) {
                return $tableConfig;
            }
        }

        abort(404);
    }

    private function getInputColumns(string $table): array
    {
        $columns = Schema::getColumnListing($table);

        return array_values(array_filter($columns, function (string $column) {
            return !in_array($column, ['id', 'created_at', 'updated_at'], true);
        }));
    }

    private function extractPayload(Request $request, array $columns, string $table): array
    {
        $payload = [];
        foreach ($columns as $column) {
            $value = $request->input($column);
            if ($column === 'sort_order' && $value === null) {
                $value = 0;
            }
            $payload[$column] = $value;
        }

        if (Schema::hasColumn($table, 'posted_at') && $request->filled('posted_at')) {
            $payload['posted_at'] = $request->input('posted_at');
        }

        return $payload;
    }

    private function touchInsert(string $table, array &$payload): void
    {
        $now = now();
        if (Schema::hasColumn($table, 'created_at') && !array_key_exists('created_at', $payload)) {
            $payload['created_at'] = $now;
        }
        if (Schema::hasColumn($table, 'updated_at') && !array_key_exists('updated_at', $payload)) {
            $payload['updated_at'] = $now;
        }
    }

    private function touchUpdate(string $table, array &$payload): void
    {
        if (Schema::hasColumn($table, 'updated_at') && !array_key_exists('updated_at', $payload)) {
            $payload['updated_at'] = now();
        }
    }
}
