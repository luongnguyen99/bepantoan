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
        $data = [
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
        ];
        DB::table('options')->insert($data);
    }
}
