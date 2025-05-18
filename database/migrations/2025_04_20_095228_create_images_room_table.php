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
        Schema::create('images_room', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_room');
            $table->unsignedBigInteger('id_image');
            $table->foreign('id_room')->references('id')->on('room')->onDelete('cascade');
            $table->foreign('id_image')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_room');
    }
};
