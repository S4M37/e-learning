<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_exams', function (Blueprint $table) {
            $table->increments('id_it_exam');
            $table->string('response');
            $table->integer('id_result')->unsigned();
            $table->foreign('id_result')
                ->references('id_result')
                ->on('results')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('id_exam')->unsigned();
            $table->foreign('id_exam')
                ->references('id_exam')
                ->on('exams')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')
                ->references('id_item')
                ->on('items')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_exams', function(Blueprint $table) {

            $table->dropForeign(['id_item']);
            $table->dropForeign(['id_exam']);
            $table->dropForeign(['id_result']);
        });
        Schema::drop('item_exams');
    }
}
