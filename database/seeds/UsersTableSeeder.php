<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //buat 5 data baru
        $user = factory(\App\User::class , 5 )->create();
    }
}
