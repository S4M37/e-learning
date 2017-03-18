<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'label' => 'Category 1'
        ]);
        DB::table('categories')->insert([
            'label' => 'Category 2'
        ]);
    }
}
