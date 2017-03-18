<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_results', function (Blueprint $table) {
            $table->increments('id_item_exam');
            $table->string('response');
            $table->integer('id_result')->unsigned();
            $table->foreign('id_result')
                ->references('id_result')
                ->on('results')
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
        Schema::table('item_results', function (Blueprint $table) {
            $table->dropForeign(['id_item']);
            $table->dropForeign(['id_exam']);
        });
        Schema::drop('item_results');
    }
}
