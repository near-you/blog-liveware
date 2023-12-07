<?php

use App\Models\About;
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
        Schema::create('knowledge', function (Blueprint $table) {
            $table->id();
            $table->string('knowledge_name')->nullable();
            $table->foreignIdFor(About::class, 'about_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge');
    }
};
