<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_category', function (Blueprint $table) {
            $table->increments('id_exam_category');
            $table->integer('id_exam')->unsigned();
            $table->foreign('id_exam')
                ->references('id_exam')
                ->on('exams')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')
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
        Schema::table('exam_category', function (Blueprint $table) {
            $table->dropForeign(['id_category']);
            $table->dropForeign(['id_exam']);
        });
        Schema::drop('exam_category');
    }
}
