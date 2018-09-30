<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate();

        DB::table('users')->insert([
            'name' => 'Alex',
            'lname' => 'Rodrigues',
            'user_name' => 'alexcleiton16',
            'email' => 'alexcleiton16@gmail.com',
            'password' => bcrypt('81238174'),
        ]);

        factory(App\User::class, 2)->create();
    }
}
