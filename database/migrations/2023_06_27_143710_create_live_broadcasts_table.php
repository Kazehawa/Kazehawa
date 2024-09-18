<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.l
     */
    public function up(): void
    {
        Schema::create('live_broadcasts', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->default('default_thumbnail.jpg');
            $table->string('video');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_broadcasts');
    }
};
