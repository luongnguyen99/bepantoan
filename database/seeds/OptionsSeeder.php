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

            [   
                'name' => 'name_site',
                'key' => 'general_name_site',
                'value' => '',
            ],

            [   
                'name' => 'desc_site',
                'key' => 'general_description_site',
                'value' => '',
            ],
            [   
                'name' => 'header_code',
                'key' => 'general_header_code',
                'value' => '',
            ],
            [   
                'name' => 'footer_code',
                'key' => 'general_footer_code',
                'value' => '',
            ],
            [
                'name' => 'email_admin',
                'key' => 'email_admin',
                'value' => 'luongnd2286@gmail.com'
            ]

        ];
        DB::table('options')->insert($data);
    }
}
