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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paper_id');
            $table->unsignedBigInteger('changed_by');
            $table->string('type');
            $table->string('status');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
