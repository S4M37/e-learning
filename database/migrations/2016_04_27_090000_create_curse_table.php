<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curses', function (Blueprint $t) {
            $t->increments('id_curse');
            $t->string('label');
            $t->integer('id_category')->unsigned();
            $t->foreign('id_category')
                ->references('id_category')
                ->on('categories')
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
        Schema::table('curses', function(Blueprint $table) {

            $table->dropForeign(['id_category']);
        });
        Schema::drop('curses');
    }
}
