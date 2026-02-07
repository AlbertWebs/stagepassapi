<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportDatabaseToSeeders extends Command
{
    protected $signature = 'db:export-seeders';
    protected $description = 'Export current database records to seeder files';

    public function handle()
    {
        $this->info('Exporting database records to seeders...');

        // Export all homepage content tables
        $this->exportTable('hero_sections', 'HeroSectionSeeder');
        $this->exportTable('about_sections', 'AboutSectionSeeder');
        $this->exportTable('about_highlights', 'AboutHighlightsSeeder');
        $this->exportTable('services_sections', 'ServicesSectionSeeder');
        $this->exportTable('services', 'ServicesSeeder');
        $this->exportTable('stats_sections', 'StatsSectionSeeder');
        $this->exportTable('stats', 'StatsSeeder');
        $this->exportTable('portfolio_sections', 'PortfolioSectionSeeder');
        $this->exportTable('portfolio_items', 'PortfolioItemsSeeder');
        $this->exportTable('industries_sections', 'IndustriesSectionSeeder');
        $this->exportTable('industries', 'IndustriesSeeder');
        $this->exportTable('clients_sections', 'ClientsSectionSeeder');
        $this->exportTable('client_logos', 'ClientLogosSeeder');
        $this->exportTable('contact_sections', 'ContactSectionSeeder');
        $this->exportTable('contact_details', 'ContactDetailsSeeder');

        // Export other tables
        $this->exportTable('navbar_settings', 'NavbarSettingsSeeder');
        $this->exportTable('navbar_links', 'NavbarLinksSeeder');
        $this->exportTable('bottom_nav_links', 'BottomNavLinksSeeder');
        $this->exportTable('footer_sections', 'FooterSectionSeeder');
        $this->exportTable('footer_links', 'FooterLinksSeeder');
        $this->exportTable('footer_social_links', 'FooterSocialLinksSeeder');
        $this->exportTable('site_settings', 'SiteSettingsSeeder');
        $this->exportTable('about_pages', 'AboutPageSeeder');
        $this->exportTable('services_pages', 'ServicesPageSeeder');
        $this->exportTable('our_work_pages', 'OurWorkPageSeeder');
        $this->exportTable('industries_pages', 'IndustriesPageSeeder');

        $this->info('All seeders exported successfully!');
    }

    private function exportTable($tableName, $seederName)
    {
        try {
            if (!DB::getSchemaBuilder()->hasTable($tableName)) {
                $this->warn("Table {$tableName} does not exist, skipping...");
                return;
            }

            $records = DB::table($tableName)->get();
            
            if ($records->isEmpty()) {
                $this->warn("Table {$tableName} is empty, skipping...");
                return;
            }

            $seederPath = database_path("seeders/{$seederName}.php");
            $content = $this->generateSeederContent($tableName, $seederName, $records);
            
            File::put($seederPath, $content);
            $this->info("Exported {$records->count()} records from {$tableName} to {$seederName}");
        } catch (\Exception $e) {
            $this->error("Error exporting {$tableName}: " . $e->getMessage());
        }
    }

    private function generateSeederContent($tableName, $seederName, $records)
    {
        $now = now();
        $recordsArray = $records->map(function ($record) {
            $data = (array) $record;
            unset($data['id']); // Remove ID as it will be auto-generated
            unset($data['created_at']);
            unset($data['updated_at']);
            
            // Format the data for insertion
            $formatted = [];
            foreach ($data as $key => $value) {
                if ($value === null) {
                    $formatted[$key] = 'null';
                } elseif (is_string($value)) {
                    $formatted[$key] = "'" . addslashes($value) . "'";
                } elseif (is_bool($value)) {
                    $formatted[$key] = $value ? 'true' : 'false';
                } else {
                    $formatted[$key] = $value;
                }
            }
            return $formatted;
        })->toArray();

        $phpCode = "<?php\n\n";
        $phpCode .= "namespace Database\\Seeders;\n\n";
        $phpCode .= "use Illuminate\\Database\\Seeder;\n";
        $phpCode .= "use Illuminate\\Support\\Facades\\DB;\n\n";
        $phpCode .= "class {$seederName} extends Seeder\n";
        $phpCode .= "{\n";
        $phpCode .= "    public function run(): void\n";
        $phpCode .= "    {\n";
        $phpCode .= "        \$now = now();\n\n";
        $phpCode .= "        // Clear existing records (using delete to respect foreign keys)\n";
        $phpCode .= "        DB::table('{$tableName}')->delete();\n\n";
        $phpCode .= "        \$records = [\n";

        foreach ($recordsArray as $record) {
            $phpCode .= "            [\n";
            foreach ($record as $key => $value) {
                $phpCode .= "                '{$key}' => {$value},\n";
            }
            $phpCode .= "            ],\n";
        }

        $phpCode .= "        ];\n\n";
        $phpCode .= "        foreach (\$records as \$record) {\n";
        $phpCode .= "            DB::table('{$tableName}')->insert(array_merge(\$record, [\n";
        $phpCode .= "                'created_at' => \$now,\n";
        $phpCode .= "                'updated_at' => \$now,\n";
        $phpCode .= "            ]));\n";
        $phpCode .= "        }\n";
        $phpCode .= "    }\n";
        $phpCode .= "}\n";

        return $phpCode;
    }
}
