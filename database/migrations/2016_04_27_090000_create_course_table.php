<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $t) {
            $t->increments('id_course');
            $t->string('label');
            $t->string('pdf_path');
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
        Schema::table('courses', function(Blueprint $table) {

            $table->dropForeign(['id_category']);
        });
        Schema::drop('courses');
    }
}
