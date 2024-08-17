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
        Schema::create('service_pricing_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_pricing_section_id')->constrained('service_pricing_sections')->cascadeOnDelete();
            $table->string('item')->nullable();
            $table->boolean('item_is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pricing_items');
    }
};
