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
        Schema::create('service_pricing_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->string('service_price');
            $table->string('service_currency');
            $table->string('service_plan');
            $table->boolean('service_popular')->default(0);
            $table->string('service_purchase_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pricing_sections');
    }
};
