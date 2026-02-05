<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
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

        try {
            $columns = $this->getInputColumns($table);
            $payload = $this->extractPayload($request, $columns, $table);
            
            if (empty($payload)) {
                return back()->with('status', 'No changes to save.');
            }
            
            $this->touchUpdate($table, $payload);

            DB::table($table)->where('id', $id)->update($payload);

            return back()->with('status', 'Updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating section', [
                'section' => $sectionKey,
                'table' => $table,
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return back()->with('error', 'Failed to update: ' . $e->getMessage());
        }
    }

    public function destroy(string $sectionKey, string $table, int $id): RedirectResponse
    {
        $this->getTableConfig($sectionKey, $table);

        DB::table($table)->where('id', $id)->delete();

        return back()->with('status', 'Deleted successfully.');
    }

    private function getSectionConfig(string $sectionKey): array
    {
        $sections = $this->getSections();
        if (!isset($sections[$sectionKey])) {
            abort(404);
        }

        return $sections[$sectionKey];
    }

    private function getSections(): array
    {
        $sections = config('admin_sections.sections', []);
        if (!empty($sections)) {
            return $sections;
        }

        return [
            'navigation' => [
                'label' => 'Navigation',
                'tables' => [
                    ['name' => 'navbar_settings', 'label' => 'Navbar Settings', 'single' => true],
                    ['name' => 'navbar_links', 'label' => 'Navbar Links'],
                    ['name' => 'bottom_nav_links', 'label' => 'Bottom Navigation Links'],
                ],
            ],
            'hero' => [
                'label' => 'Hero',
                'tables' => [
                    ['name' => 'hero_sections', 'label' => 'Hero Section', 'single' => true],
                ],
            ],
            'about' => [
                'label' => 'About',
                'tables' => [
                    ['name' => 'about_sections', 'label' => 'About Section', 'single' => true],
                    ['name' => 'about_highlights', 'label' => 'Highlights'],
                ],
            ],
            'services' => [
                'label' => 'Services',
                'tables' => [
                    ['name' => 'services_sections', 'label' => 'Services Section', 'single' => true],
                    ['name' => 'services', 'label' => 'Services'],
                ],
            ],
            'stats' => [
                'label' => 'Stats',
                'tables' => [
                    ['name' => 'stats_sections', 'label' => 'Stats Section', 'single' => true],
                    ['name' => 'stats', 'label' => 'Stats'],
                ],
            ],
            'portfolio' => [
                'label' => 'Portfolio',
                'tables' => [
                    ['name' => 'portfolio_sections', 'label' => 'Portfolio Section', 'single' => true],
                    ['name' => 'portfolio_items', 'label' => 'Portfolio Items'],
                ],
            ],
            'industries' => [
                'label' => 'Industries',
                'tables' => [
                    ['name' => 'industries_sections', 'label' => 'Industries Section', 'single' => true],
                    ['name' => 'industries', 'label' => 'Industries'],
                ],
            ],
            'clients' => [
                'label' => 'Clients',
                'tables' => [
                    ['name' => 'clients_sections', 'label' => 'Clients Section', 'single' => true],
                    ['name' => 'client_logos', 'label' => 'Client Logos'],
                ],
            ],
            'contact' => [
                'label' => 'Contact',
                'tables' => [
                    ['name' => 'contact_sections', 'label' => 'Contact Section', 'single' => true],
                    ['name' => 'contact_details', 'label' => 'Contact Details'],
                ],
            ],
            'footer' => [
                'label' => 'Footer',
                'tables' => [
                    ['name' => 'footer_settings', 'label' => 'Footer Settings', 'single' => true],
                    ['name' => 'footer_social_links', 'label' => 'Social Links'],
                    ['name' => 'footer_quick_links', 'label' => 'Quick Links'],
                    ['name' => 'footer_more_links', 'label' => 'More Links'],
                    ['name' => 'footer_service_items', 'label' => 'Service Items'],
                ],
            ],
            'instagram-media' => [
                'label' => 'Instagram Media',
                'tables' => [
                    ['name' => 'instagram_media', 'label' => 'Instagram Media', 'no_create' => true, 'no_update' => true],
                ],
            ],
            'contact-messages' => [
                'label' => 'Contact Messages',
                'tables' => [
                    ['name' => 'contact_messages', 'label' => 'Contact Messages', 'no_create' => true, 'no_update' => true],
                ],
            ],
            'quote-requests' => [
                'label' => 'Quote Requests',
                'tables' => [
                    ['name' => 'quote_requests', 'label' => 'Quote Requests', 'no_create' => true, 'no_update' => true],
                ],
            ],
        ];
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
            // Check for file upload with _upload suffix (e.g., image_url_upload)
            $uploadFieldName = $column . '_upload';
            if ($request->hasFile($uploadFieldName)) {
                try {
                    $uploadedPath = $this->storeUpload($request, $uploadFieldName, $table, $column);
                    $payload[$column] = $uploadedPath;
                    Log::info("File uploaded for {$table}.{$column}", [
                        'path' => $uploadedPath,
                        'field' => $uploadFieldName,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Failed to upload file for {$table}.{$column}", [
                        'error' => $e->getMessage(),
                        'field' => $uploadFieldName,
                    ]);
                }
                continue;
            }
            
            // Also check for direct file upload (e.g., logo_url)
            if ($request->hasFile($column)) {
                $payload[$column] = $this->storeUpload($request, $column, $table, $column);
                continue;
            }

            $value = $request->input($column);
            
            // For nullable columns like thumbnail_url, preserve existing value if not provided
            // BUT only if no file was uploaded (file uploads are handled above)
            if ($column === 'thumbnail_url' && empty($value) && !$request->hasFile('thumbnail_url_upload')) {
                // Skip if empty and no file upload - will preserve existing database value
                continue;
            }
            
            if ($column === 'sort_order' && $value === null) {
                $value = 0;
            }
            
            // Only set if value is not null
            if ($value !== null) {
                $payload[$column] = $value;
            }
        }

        if (Schema::hasColumn($table, 'posted_at') && $request->filled('posted_at')) {
            $payload['posted_at'] = $request->input('posted_at');
        }

        return $payload;
    }

    private function storeUpload(Request $request, string $uploadFieldName, string $table, ?string $columnName = null): string
    {
        $file = $request->file($uploadFieldName);
        // Use columnName if provided (for _upload suffix fields), otherwise use uploadFieldName
        $column = $columnName ?? $uploadFieldName;
        
        // For about_sections image_url, upload to public/uploads directory
        if ($table === 'about_sections' && ($column === 'image_url' || str_ends_with($uploadFieldName, 'image_url_upload'))) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadsPath = public_path('uploads');
            
            // Ensure uploads directory exists
            if (!file_exists($uploadsPath)) {
                mkdir($uploadsPath, 0755, true);
            }
            
            $file->move($uploadsPath, $filename);
            return 'uploads/' . $filename;
        }
        
        // For hero_sections thumbnail_url, upload to public/uploads directory
        if ($table === 'hero_sections' && ($column === 'thumbnail_url' || str_ends_with($uploadFieldName, 'thumbnail_url_upload'))) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadsPath = public_path('uploads');
            
            // Ensure uploads directory exists
            if (!file_exists($uploadsPath)) {
                mkdir($uploadsPath, 0755, true);
            }
            
            $file->move($uploadsPath, $filename);
            return 'uploads/' . $filename;
        }
        
        // Default behavior for other uploads
        $dir = "admin/{$table}";
        $path = $file->storePublicly($dir, 'public');

        return ltrim(Storage::disk('public')->url($path), '/');
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
