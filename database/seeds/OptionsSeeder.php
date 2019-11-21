<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->delete();
        DB::table('options')->insert([
            [
                'name' => 'logo',
                'key' => 'logo',
                'value' => '',
            ],
            [
                'name' => 'footer',
                'key' => 'footer',
                'value' => '',
            ],
            [
                'name' => 'hotline',
                'key' => 'hotline',
                'value' => '',
            ],
            [
                'name' => 'payment',
                'key' => 'payment',
                'value' => '',
            ],
            [
                'name' => 'social_network',
                'key' => 'social_network',
                'value' => '',
            ],
            [
                'name' => 'slide',
                'key' => 'slide',
                'value' => '',
            ],
            [
                'name' => 'menu',
                'key' => 'menu',
                'value' => '',
            ],
            [
                'name' => 'menu_phone',
                'key' => 'menu_phone',
                'value' => '',
            ],
        ]); 
    }
}
