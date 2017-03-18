<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // run composer dump-autoload if classes not found
        $this->call(CategoriesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ChoicesTableSeeder::class);
        $this->call(ExamCategoryTableSeeder::class);
    }
}
