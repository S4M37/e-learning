<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $t) {
            $t->increments('id_choice');
            $t->string('label');
            $t->boolean('valid');
            $t->integer('id_item')->unsigned();
            $t->foreign('id_item')
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
        Schema::table('choices', function(Blueprint $table) {

            $table->dropForeign(['id_item']);

        });
        Schema::drop('choices');
    }
}
