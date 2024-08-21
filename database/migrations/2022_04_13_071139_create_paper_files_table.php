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
        Schema::create('paper_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paper_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper_files');
    }
};
