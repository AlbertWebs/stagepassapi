<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('navbar_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('navbar_settings', 'favicon_url')) {
                $table->string('favicon_url')->nullable()->after('logo_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('navbar_settings', function (Blueprint $table) {
            if (Schema::hasColumn('navbar_settings', 'favicon_url')) {
                $table->dropColumn('favicon_url');
            }
        });
    }
};
