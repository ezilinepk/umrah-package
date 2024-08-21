<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paper_files', function (Blueprint $table) {
            $table->text('description')->nullable()->after('file');
            $table->enum('type',['trg','uploader','other'])->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paper_files', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('type');
        });
    }
};
