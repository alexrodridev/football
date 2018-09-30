<?php

use Illuminate\Database\Seeder;

class SeguidoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Seguidores::truncate();

        factory(App\Seguidores::class, 9)->create();
    }
}
