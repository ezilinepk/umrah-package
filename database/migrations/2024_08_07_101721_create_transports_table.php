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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('transport_type');
            $table->decimal('price_airport_makkah', 8, 2)->nullable();
            $table->decimal('price_makkah_madina', 8, 2)->nullable();
            $table->decimal('price_madina_makkah', 8, 2)->nullable();
            $table->string('currency')->default('usd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};
