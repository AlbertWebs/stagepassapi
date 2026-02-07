<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\HomepageContentSeeder;
use Database\Seeders\SiteSettingsSeeder;
use Database\Seeders\AboutPageSeeder;
use Database\Seeders\ServicesPageSeeder;
use Database\Seeders\OurWorkPageSeeder;
use Database\Seeders\IndustriesPageSeeder;
use Database\Seeders\NavbarSettingsSeeder;
use Database\Seeders\NavbarLinksSeeder;
use Database\Seeders\BottomNavLinksSeeder;
use Database\Seeders\FooterSocialLinksSeeder;

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
            [
                'name' => 'Test User',
                'password' => 'password', // Will be automatically hashed by the model
            ]
        );

        $this->call(NavbarSettingsSeeder::class);
        $this->call(NavbarLinksSeeder::class);
        $this->call(BottomNavLinksSeeder::class);
        $this->call(FooterSocialLinksSeeder::class);
        $this->call(HomepageContentSeeder::class);
        $this->call(SiteSettingsSeeder::class);
        $this->call(AboutPageSeeder::class);
        $this->call(ServicesPageSeeder::class);
        $this->call(OurWorkPageSeeder::class);
        $this->call(IndustriesPageSeeder::class);
    }
}
