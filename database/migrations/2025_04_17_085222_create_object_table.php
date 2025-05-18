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
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('description',2000);
            $table->string('address',500);
            $table->string('main_img',300);
            $table->decimal('sizem2',5, 2);
            $table->unsignedBigInteger('id_room_type');
            $table->foreign('id_room_type')->references('id')->on('room_type')->onDelete('cascade');
            $table->smallInteger('max_adults')->index();
            $table->smallInteger('max_children')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('object');
    }
};
