<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                OptionsSeeder::class,
                Post_categorySeeder::class,
                PostSeeder::class,
                ShowroomSeeder::class,
            ]
        );
       
    }
}
