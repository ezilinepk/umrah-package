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
        Schema::create('help__chat_conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('help_chat_id');
            $table->string('path');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('help_chat_id')->references('id')->on('help__chats')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help__chat_conversations');
    }
};
