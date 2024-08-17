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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->text('short_description')->nullable();
            $table->string('facebook_link')->nullable()->default('#');
            $table->string('twitter_link')->nullable()->default('#');
            $table->string('behance_link')->nullable()->default('#');
            $table->string('linkedin_link')->nullable()->default('#');
            $table->string('instagram_link')->nullable()->default('#');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
