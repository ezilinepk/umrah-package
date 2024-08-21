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
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->decimal('visa_price', 10, 2);
            $table->date('visa_valid_date');
            $table->date('visa_exp_date');
            $table->string('visa_country');
            $table->string('visa_type');
            $table->string('visa_place_of_issue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
