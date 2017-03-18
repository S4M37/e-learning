<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            DB::table('choices')->insert([
                'label' => 'choice ' . $i,
                'id_item' => 1,
                'valid' => $i % 2 == 0 ? false : true
            ]);
        }
        for ($i = 0; $i < 2; $i++) {
            DB::table('choices')->insert([
                'label' => 'choice ' . $i,
                'id_item' => 2,
                'valid' => true
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            DB::table('choices')->insert([
                'label' => 'choice ' . $i,
                'id_item' => 3,
                'valid' => $i % 2 == 0 ? true : false
            ]);
        }
        for ($i = 0; $i < 3; $i++) {
            DB::table('choices')->insert([
                'label' => 'choice ' . $i,
                'id_item' => 4,
                'valid' => $i % 2 > 0 ? false : true
            ]);
        }

    }
}
