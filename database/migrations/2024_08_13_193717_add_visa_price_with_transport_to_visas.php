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
        Schema::table('visas', function (Blueprint $table) {
            $table->decimal('visa_price_with_transport', 10, 2)->nullable()->after('visa_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visas', function (Blueprint $table) {
            //
        });
    }
};
