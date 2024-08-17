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
        Schema::create('portfolio_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_id')->constrained('portfolios')->cascadeOnDelete();
            $table->string('category');
            $table->string('developer');
            $table->string('project_title')->nullable();
            $table->text('project_description')->nullable();
            $table->string('project_url')->nullable();
            $table->string('client')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('portfolio_detail_id')->after('service_partner_section_id')->nullable()->constrained('images')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['portfolio_detail_id']);
            $table->dropColumn('portfolio_detail_id');
        });

        Schema::dropIfExists('portfolio_details');
    }
};
