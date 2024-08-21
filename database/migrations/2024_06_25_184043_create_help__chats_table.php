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
        Schema::create('help__chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->unsignedBigInteger('sendto_id')->nullable();
            $table->text('message');
            $table->enum('type', ['image', 'voice'])->nullable();
            $table->enum('status', ['open', 'ended'])->nullable();
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sendto_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help__chats');
    }
};
