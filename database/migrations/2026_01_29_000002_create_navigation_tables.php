<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('navbar_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_url');
            $table->string('cta_label');
            $table->string('cta_href')->nullable();
            $table->timestamps();
        });

        Schema::create('navbar_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('navbar_settings_id')->constrained('navbar_settings')->cascadeOnDelete();
            $table->string('label');
            $table->string('href');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('bottom_nav_links', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('href');
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bottom_nav_links');
        Schema::dropIfExists('navbar_links');
        Schema::dropIfExists('navbar_settings');
    }
};
