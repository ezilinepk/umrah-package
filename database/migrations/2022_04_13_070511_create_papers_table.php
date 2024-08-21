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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->enum('status',['pending','reject','approaved'])->default('pending');
            $table->date('date');
            $table->unsignedBigInteger('uploaded_by');
            $table->unsignedBigInteger('approved_by_trg')->nullable();
            $table->text('trg_comment')->nullable();
            $table->enum('trg_status',['pending','reject','approaved'])->default('pending');        
            $table->unsignedBigInteger('approved_by_senior_intructor')->nullable();
            $table->text('senior_instructor_comment')->nullable();
            $table->enum('senior_instructor_status',['pending','reject','approaved'])->default('pending');        
            $table->unsignedBigInteger('approved_by_chief_instructor')->nullable();
            $table->text('chief_instructor_comment')->nullable();
            $table->enum('chief_instructor_status',['pending','reject','approaved'])->default('pending');        
            $table->timestamps();

            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by_trg')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by_senior_intructor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by_chief_instructor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papers');
    }
};
