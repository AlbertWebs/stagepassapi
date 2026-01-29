<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\HomepageContentSeeder;
use Database\Seeders\SiteSettingsSeeder;
use Database\Seeders\PageContentSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::query()->updateOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User']
        );

        $this->call(HomepageContentSeeder::class);
        $this->call(SiteSettingsSeeder::class);
        $this->call(PageContentSeeder::class);
    }
}
