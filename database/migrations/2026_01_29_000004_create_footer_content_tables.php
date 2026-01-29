<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_url');
            $table->text('description')->nullable();
            $table->string('copyright');
            $table->timestamps();
        });

        Schema::create('footer_social_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_settings_id')->constrained('footer_settings')->cascadeOnDelete();
            $table->string('platform');
            $table->string('url');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('footer_quick_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_settings_id')->constrained('footer_settings')->cascadeOnDelete();
            $table->string('label');
            $table->string('href');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('footer_more_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_settings_id')->constrained('footer_settings')->cascadeOnDelete();
            $table->string('label');
            $table->string('href');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('footer_service_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_settings_id')->constrained('footer_settings')->cascadeOnDelete();
            $table->string('label');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_service_items');
        Schema::dropIfExists('footer_more_links');
        Schema::dropIfExists('footer_quick_links');
        Schema::dropIfExists('footer_social_links');
        Schema::dropIfExists('footer_settings');
    }
};
