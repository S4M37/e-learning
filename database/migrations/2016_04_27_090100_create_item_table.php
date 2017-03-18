<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $t) {
            $t->increments('id_item');
            $t->string('label');
            $t->integer('id_exam');
            $t->foreign('id_exam')
                ->references('id_exam')
                ->on('exams')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['id_category']);
            $table->dropForeign(['id_exam']);
        });
        Schema::drop('items');
    }
}
