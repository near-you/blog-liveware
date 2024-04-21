<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolio_social_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_media_id')->references('id')->on('portfolios')->onDelete('cascade');
            $table->string('youtube')->default('https://youtube.com')->nullable();
            $table->string('vimeo')->default('https://vimeo.com/')->nullable();
            $table->string('soundcloud')->default('https://w.soundcloud.com/')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_social_media');
    }
};
