<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // About Page
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });

        // Services Page
        Schema::create('services_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        // Our Work Page
        Schema::create('our_work_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        // Industries Page
        Schema::create('industries_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        // Contact Page
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->text('form_title')->nullable();
            $table->text('form_description')->nullable();
            $table->timestamps();
        });

        // Terms and Conditions Page
        Schema::create('terms_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->date('last_updated')->nullable();
            $table->timestamps();
        });

        // Privacy Policy Page
        Schema::create('privacy_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->date('last_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('privacy_pages');
        Schema::dropIfExists('terms_pages');
        Schema::dropIfExists('contact_pages');
        Schema::dropIfExists('industries_pages');
        Schema::dropIfExists('our_work_pages');
        Schema::dropIfExists('services_pages');
        Schema::dropIfExists('about_pages');
    }
};
