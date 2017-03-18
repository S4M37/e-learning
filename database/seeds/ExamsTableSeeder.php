<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert([
            'label' => 'Training 1',
            'duration' => 0,
            'is_training' => true
        ]);
    }
}
