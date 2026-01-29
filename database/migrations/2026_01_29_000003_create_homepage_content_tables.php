<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->text('headline');
            $table->string('background_video_url');
            $table->timestamps();
        });

        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_label');
            $table->string('title');
            $table->text('description_primary');
            $table->text('description_secondary')->nullable();
            $table->string('image_url');
            $table->string('stat_value')->nullable();
            $table->string('stat_label')->nullable();
            $table->string('button_label')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_text')->nullable();
            $table->timestamps();
        });

        Schema::create('about_highlights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_section_id')->constrained('about_sections')->cascadeOnDelete();
            $table->string('text');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('services_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_label');
            $table->string('title');
            $table->text('description');
            $table->string('people_title')->nullable();
            $table->text('people_description')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_section_id')->constrained('services_sections')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable();
            $table->string('gradient')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('stats_sections', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->string('subheadline')->nullable();
            $table->string('background_video_url')->nullable();
            $table->timestamps();
        });

        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stats_section_id')->constrained('stats_sections')->cascadeOnDelete();
            $table->string('value');
            $table->string('label');
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_label');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_section_id')->constrained('portfolio_sections')->cascadeOnDelete();
            $table->string('type');
            $table->string('thumbnail');
            $table->string('title');
            $table->string('youtube_id')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('industries_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->timestamps();
        });

        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('industries_section_id')->constrained('industries_sections')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('link_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('clients_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_label');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('client_logos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clients_section_id')->constrained('clients_sections')->cascadeOnDelete();
            $table->string('logo_path');
            $table->string('alt_text')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('contact_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_label');
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_section_id')->constrained('contact_sections')->cascadeOnDelete();
            $table->string('label');
            $table->text('value');
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_details');
        Schema::dropIfExists('contact_sections');
        Schema::dropIfExists('client_logos');
        Schema::dropIfExists('clients_sections');
        Schema::dropIfExists('industries');
        Schema::dropIfExists('industries_sections');
        Schema::dropIfExists('portfolio_items');
        Schema::dropIfExists('portfolio_sections');
        Schema::dropIfExists('stats');
        Schema::dropIfExists('stats_sections');
        Schema::dropIfExists('services');
        Schema::dropIfExists('services_sections');
        Schema::dropIfExists('about_highlights');
        Schema::dropIfExists('about_sections');
        Schema::dropIfExists('hero_sections');
    }
};
