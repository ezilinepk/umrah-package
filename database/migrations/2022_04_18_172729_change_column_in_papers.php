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
        Schema::table('papers', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id_2')->after('category_id')->nullable();
            $table->string('module_name')->after('category_id_2')->nullable();
            $table->string('course_name')->after('module_name')->nullable();

            $table->foreign('category_id_2')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('papers', function (Blueprint $table) {
            $table->dropForeign(['category_id_2']);
            $table->dropColumn('category_id_2');
            $table->dropColumn('module_name');
            $table->dropColumn('course_name');
        });
    }
};
