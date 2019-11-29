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
                'value' => url('/').'/userfiles/images/logo-bepantoan.png',
            ],
            [
                'name' => 'footer',
                'key' => 'footer',
                'value' => '',
            ],
            [
                'name' => 'hotline',
                'key' => 'hotline',
                'value' => '{"phone":"0377667727","content":"hotline"}',
            ],
            [
                'name' => 'payment',
                'key' => 'payment',
                'value' => '[{"type":"fa fa-cc-visa"},{"type":"fa fa-cc-mastercard"},{"type":"fa fa-cc-paypal"},{"type":"fa fa-cc-discover"},{"type":"fa fa-cc-stripe"}]',
            ],
            [
                'name' => 'social_network',
                'key' => 'social_network',
                'value' => '[{"type":"fa fa-facebook"},{"type":"fa fa-twitter"},{"type":"fa fa-google-plus"},{"type":"fa fa-instagram"}]',
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
                'value' => '[[{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/dmestik.jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/bosch(1).jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/CHEFS.jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/dmestik.jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/bosch(1).jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/CHEFS.jpg"}]]',
            ],
            [
                'name' => 'email_admin',
                'key' => 'email_admin',
                'value' => 'luongnd2286@gmail.com'
            ],
            [
                'name' => 'menu',
                'key' => 'menu',
                'value' => '[{"clss":"class1","icon":"icon1","name":"Menu1","link":"link1"},{"name":"Menu2","link":"link2","icon":"icon2","clss":"class2"},{"name":"Menu3","link":"link3","icon":"icon3","clss":"class3"},{"name":"Menu4","link":"Link4","icon":"icon4","clss":"class4"}]',
            ],
            [
                'name' => 'menu_phone',
                'key' => 'menu_phone',
                'value' => '[{"name":"Menu di \u0111\u1ed9ng","link":"link di \u0111\u1ed9ng","icon":"icon di \u0111\u1ed9ng","clss":"class di \u0111\u1ed9ng"},{"name":"Menu di \u0111\u1ed9ng  X","link":"Menu di \u0111\u1ed9ng Y","icon":"Menu di \u0111\u1ed9ng","clss":"Menu di \u0111\u1ed9ng"},{"name":"Menu di \u0111\u1ed9ng Y","link":null,"icon":null,"clss":null}]',
            ],
            [
                'name' => 'sale',
                'key' => 'sale',
                'value' => '<p>CHƯƠNG TR&Igrave;NH KHUYẾN M&Atilde;I</p>

                <p>Giảm tới 10%</p>',
            ],
            [
                'name' => 'switchboard',
                'key' => 'switchboard',
                'value' => '{"phone":"0377667727","content":"T\u1ed5ng \u0111\u00e0i t\u01b0 v\u1ea5n"}',
            ],
            [
                'name' => 'method_payment',
                'key' => 'method_payment',
                'value' => '',
            ],
            [
                'name' => 'sidebar',
                'key' => 'sidebar',
                'value' => '[{"text":"Cam k\u1ebft gi\u00e1 t\u1ed1t nh\u1ea5t","icon":"akr-icon_Cash"},{"text":"Nh\u1eadn \u0111\u1ed5i tr\u1ea3 trong 30 ng\u00e0y","icon":"akr-icon_Cash"},{"text":"B\u1ea3o tr\u00ec v\u0129nh vi\u1ec5n tr\u1ecdn \u0111\u1eddi m\u00e1y","icon":"akr-icon_Cash"},{"text":"Mi\u1ec5n ph\u00ed l\u1eafp \u0111\u1eb7t t\u1ea1i H\u00e0 N\u1ed9i","icon":"akr-icon_Cash"},{"text":"Giao h\u00e0ng to\u00e0n qu\u1ed1c","icon":"akr-icon_Cash"},{"text":"Thanh to\u00e1n khi nh\u1eadn h\u00e0ng","icon":"akr-icon_Cash"}]',
            ],
            [
                'name' => 'footer_copy',
                'key' => 'footer_copy',
                'value' => '{"footer":"Copyright 2019 - B\u1ea3n quy\u1ec1n c\u1ee7a C\u00f4ng ty ..... s\u1ea3n xu\u1ea5t v\u00e0 th\u01b0\u01a1ng m\u1ea1i ...."}',
            ],
            [
                'name' => 'introduce',
                'key' => 'introduce',
                'value' => '',
            ],
            [
                'name' => 'posts_per_page',
                'key' => 'posts_per_page',
                'value' => '8',
            ],
            [
                'name' => 'categories_show_home',
                'key' => 'categories_show_home',
                'value' => '',
            ],
            
        ]);

    }
}
