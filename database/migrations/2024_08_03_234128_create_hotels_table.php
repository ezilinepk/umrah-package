<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->string('hotel_city');
            $table->string('package_name');
            $table->string('hotel_google_map')->nullable();
            $table->unsignedTinyInteger('hotel_star');
            $table->decimal('hotel_distance', 8, 1);
            $table->string('hotel_picture')->nullable();
            $table->json('hotel_images')->nullable();
            $table->decimal('room_price_sharing', 10, 2);
            $table->decimal('room_price_quint', 10, 2);
            $table->decimal('room_price_triple', 10, 2);
            $table->decimal('room_price_quad', 10, 2);
            $table->decimal('room_price_double', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
