<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'label' => 'Course 1',
            'id_category' => 1,
            'pdf_path' => '/uploads/course1.pdf',
        ]);
    }
}
