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
        Schema::table('hotels', function (Blueprint $table) {
            $table->json('room_price_sharing')->change();
            $table->json('room_price_quint')->change();
            $table->json('room_price_triple')->change();
            $table->json('room_price_quad')->change();
            $table->json('room_price_double')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->decimal('room_price_sharing', 10, 2)->change();
            $table->decimal('room_price_quint', 10, 2)->change();
            $table->decimal('room_price_triple', 10, 2)->change();
            $table->decimal('room_price_quad', 10, 2)->change();
            $table->decimal('room_price_double', 10, 2)->change();
        });
    }
};
