<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id_result');
            $table->string('label');
            $table->float('score');
            $table->text('observation');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('id_exam')->unsigned();
            $table->foreign('id_exam')
                ->references('id_exam')
                ->on('exams')
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
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['id_user', 'id_exam']);
        });

        Schema::drop('results');
    }
}
