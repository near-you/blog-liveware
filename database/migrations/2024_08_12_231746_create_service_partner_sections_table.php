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
        Schema::create('service_partner_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->string('partner_company_name')->nullable();
            $table->string('partner_website_url')->nullable();
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('service_partner_section_id')->after('service_what_i_do_section_id')->nullable()->constrained('service_partner_sections')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['service_partner_section_id']);
            $table->dropColumn('service_partner_section_id');
        });

        Schema::dropIfExists('service_partner_sections');
    }
};
