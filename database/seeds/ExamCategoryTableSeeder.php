<?php

use Illuminate\Database\Seeder;

class ExamCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_category')->insert([
            'id_category' => 1,
            'id_exam' => 1
        ]);
        
    }
}
