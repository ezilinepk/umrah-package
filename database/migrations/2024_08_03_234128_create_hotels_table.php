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
            $table->string('hotel_google_map')->nullable();
            $table->unsignedTinyInteger('hotel_star');
            $table->decimal('hotel_distance', 5, 1)->nullable();
            $table->string('hotel_picture')->nullable(); // Store filename or URL
            $table->decimal('room_price_sharing', 8, 2)->nullable();
            $table->string('room_price_sharing_currency', 3)->default('PKR'); // Default to PKR
            $table->decimal('room_price_quint', 8, 2)->nullable();
            $table->string('room_price_quint_currency', 3)->default('PKR'); // Default to PKR
            $table->decimal('room_price_triple', 8, 2)->nullable();
            $table->string('room_price_triple_currency', 3)->default('PKR'); // Default to PKR
            $table->decimal('room_price_double', 8, 2)->nullable();
            $table->string('room_price_double_currency', 3)->default('PKR'); // Default to PKR
            $table->decimal('room_price_quad', 8, 2)->nullable();
            $table->string('room_price_quad_currency', 3)->default('PKR'); // Default to PKR
            $table->text('hotel_room_details')->nullable();
            $table->text('hotel_details')->nullable();

            // Daily prices for sharing room
            $this->addDailyPriceColumns($table, 'sharing');

            // Daily prices for quint room
            $this->addDailyPriceColumns($table, 'quint');

            // Daily prices for triple room
            $this->addDailyPriceColumns($table, 'triple');

            // Daily prices for double room
            $this->addDailyPriceColumns($table, 'double');

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

    private function addDailyPriceColumns(Blueprint $table, $roomType)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($daysOfWeek as $day) {
            $table->decimal("{$day}_price_{$roomType}", 8, 2)->nullable();
            $table->string("{$day}_price_{$roomType}_currency")->nullable();
        }
    }
};
