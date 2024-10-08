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
        Schema::table('hotels', function (Blueprint $table) {
            $table->text('hotel_details')->change()->nullable();  // Change 'hotel_details' to TEXT
        });
    }

    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('hotel_details', 255)->change()->nullable(); ;  // Revert back if needed
        });
    }
};