<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $t) {
            $t->increments('id_exam');
            $t->date('test_date');
            $t->string('label');
            $t->integer('id_category')->unsigned();
            $t->foreign('id_category')
                ->references('id_category')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $t->integer('id_user')->unsigned();
            /*$t->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function(Blueprint $table) {

            $table->dropForeign(['id_category']);
            $table->dropForeign(['id_user']);

        });
        Schema::drop('exams');
    }
}
