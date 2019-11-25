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
                'name' => 'name_site',
                'key' => 'general_name_site',
                'value' => 'BepAnToan',
            ],

            [   
                'name' => 'desc_site',
                'key' => 'general_description_site',
                'value' => 'Bep an toan site',
            ],
            [   
                'name' => 'header_code',
                'key' => 'general_header_code',
                'value' => ' ',
            ],
            [   
                'name' => 'footer_code',
                'key' => 'general_footer_code',
                'value' => ' ',
            ],
            [
                'name' => 'slide',
                'key' => 'slide',
                'value' => '',
            ],
            [
<<<<<<< HEAD
                'name' => 'email_admin',
                'key' => 'email_admin',
                'value' => 'luongnd2286@gmail.com'
            ]
=======
                'name' => 'menu',
                'key' => 'menu',
                'value' => '',
            ],
            [
                'name' => 'menu_phone',
                'key' => 'menu_phone',
                'value' => '',
            ],
            [
                'name' => 'sale',
                'key' => 'sale',
                'value' => '',
            ],
            [
                'name' => 'switchboard',
                'key' => 'switchboard',
                'value' => '',
            ],
            [
                'name' => 'method_payment',
                'key' => 'method_payment',
                'value' => '',
            ],
            [
                'name' => 'sidebar',
                'key' => 'sidebar',
                'value' => '',
            ],
        ]);
>>>>>>> d3e38fcb262744188c51859f7ea68ac4c031fef1

    }
}
