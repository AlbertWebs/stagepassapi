<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instagram_media', function (Blueprint $table) {
            $table->id();
            $table->string('instagram_id')->unique();
            $table->string('media_type');
            $table->text('media_url');
            $table->text('thumbnail_url')->nullable();
            $table->text('permalink')->nullable();
            $table->text('caption')->nullable();
            $table->timestamp('posted_at')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->json('raw_payload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instagram_media');
    }
};
