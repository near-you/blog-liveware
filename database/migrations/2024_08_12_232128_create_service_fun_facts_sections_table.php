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
        Schema::create('service_fun_facts_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->integer('fact_count')->nullable();
            $table->string('fact_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_fun_facts_sections');
    }
};
