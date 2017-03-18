<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'label' => 'Praesent vehicula ante quis est lacinia aliquet. Suspendisse felis velit,tristique eu nulla sit amet, congue tempus odio. Donec consequat elit mattis orci cursus viverra ?',
            'id_category' => 1,
            'id_exam' => 1
        ]);
        DB::table('items')->insert([
            'label' => 'Cras ex nisi, venenatis porta consequat ut, suscipit ac lacus. Nunc sit amet purus gravida, consequat sapien a, scelerisque dui ',
            'id_category' => 1,
            'id_exam' => 1
        ]);
        DB::table('items')->insert([
            'label' => 'Ut fermentum massa maximus est pellentesque, nec mattis mauris mattis. Phasellus mollis quam non interdum rhoncus',
            'id_category' => 1,
            'id_exam' => 1
        ]);
        DB::table('items')->insert([
            'label' => 'Donec ornare pellentesque dui sit amet interdum. Etiam est nunc, facilisis id tincidunt et, congue quis nisl. Morbi tincidunt tempus ',
            'id_category' => 1,
            'id_exam' => 1
        ]);
    }
}
