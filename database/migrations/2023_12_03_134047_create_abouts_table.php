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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('my_profession', 250)->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('study')->nullable();
            $table->string('degree')->nullable();
            $table->string('interest')->nullable();
            $table->string('freelance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
