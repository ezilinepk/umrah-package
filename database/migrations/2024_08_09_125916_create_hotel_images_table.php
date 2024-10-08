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
        Schema::create('hotel_images', function (Blueprint $table) {
            $table->id(); // This is an alias for unsignedBigInteger('id') with auto-increment.
            $table->unsignedBigInteger('hotel_id'); // Ensure this matches the type of the referenced column.
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->string('hotel_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_images', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']); // Drop the foreign key constraint first
        });

        Schema::dropIfExists('hotel_images');
    }
};
