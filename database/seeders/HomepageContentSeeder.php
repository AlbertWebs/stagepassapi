<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomepageContentSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // Seed in order respecting foreign key relationships
        $this->call(HeroSectionSeeder::class);
        $this->call(AboutSectionSeeder::class);
        $this->call(AboutHighlightsSeeder::class);
        $this->call(ServicesSectionSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(StatsSectionSeeder::class);
        $this->call(StatsSeeder::class);
        $this->call(PortfolioSectionSeeder::class);
        $this->call(PortfolioItemsSeeder::class);
        $this->call(IndustriesSectionSeeder::class);
        $this->call(IndustriesSeeder::class);
        $this->call(ClientsSectionSeeder::class);
        $this->call(ClientLogosSeeder::class);
        $this->call(ContactSectionSeeder::class);
        $this->call(ContactDetailsSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
