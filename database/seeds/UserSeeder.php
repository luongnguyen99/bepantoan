<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $users[0] = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 500,

        ];

        if (DB::table('users')->count() <= 0) {
            DB::table('users')->insert($users);
        }
    }
}
