<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Service Pages Table
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g., 'rigging-truss-services', 'audio/sporting-events'
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // Industry Pages Table
        Schema::create('industry_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g., '4' or a more descriptive slug
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_pages');
        Schema::dropIfExists('service_pages');
    }
};
