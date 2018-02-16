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
        $faker = Faker\Factory::create('id_ID');
        $limit = 10;

        for ($i = 0 ; $i < $limit ; $i++){
            \App\Item::insert([
                'text' => $faker->unique()->name(),
                'body' => $faker->paragraph(),
            ]);
        }

    }
}
