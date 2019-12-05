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
        $options = array(
            array('id' => '1','name' => 'logo','key' => 'logo','value' => 'http://luongnd2286.xyz/userfiles/images/logo-bepantoan.png','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'footer','key' => 'footer','value' => '{"block1":"<div class=\\"res-text single-text\\">\\r\\n<div class=\\"footer-title\\">\\r\\n<div class=\\"logo-f\\"><img alt=\\"\\" src=\\"http:\\/\\/luongnd2286.xyz\\/userfiles\\/images\\/logo-bepantoan.png\\" style=\\"height:108px; width:350px\\" \\/><\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\"footer-text\\">\\r\\n<ul>\\r\\n\\t<li>\\r\\n\\t<p>Mua h&agrave;ng <a href=\\"#\\">  0912331335<\\/a> (7:00 - 20:00)<\\/p>\\r\\n\\t<\\/li>\\r\\n\\t<li>\\r\\n\\t<p>B\\u1ea3o h&agrave;nh <a href=\\"#\\">  0912331335 <\\/a> (8:00 - 20:00)<\\/p>\\r\\n\\t<\\/li>\\r\\n\\t<li>\\r\\n\\t<p>Khi\\u1ebfu n\\u1ea1i <a href=\\"#\\">  0912331335<\\/a> (8:00 - 20:30)<\\/p>\\r\\n\\t<\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<\\/div>","block2":"<div class=\\"res-text single-text\\">\\r\\n<div class=\\"footer-title\\">\\r\\n<h4>Th&ocirc;ng tin c&ocirc;ng ty<\\/h4>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\"footer-menu\\">\\r\\n<ul>\\r\\n\\t<li><a href=\\"#\\">Gi\\u1edbi thi\\u1ec7u<\\/a><\\/li>\\r\\n\\t<li><a href=\\"#\\">Tuy\\u1ec3n d\\u1ee5ng<\\/a><\\/li>\\r\\n\\t<li><a href=\\"#\\">Quy ch\\u1ebf ho\\u1ea1t \\u0111\\u1ed9ng<\\/a><\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<\\/div>","block3":"<div class=\\"res-text single-text\\">\\r\\n<div class=\\"footer-title\\">\\r\\n<h4>H\\u1ed7 tr\\u1ee3 kh&aacute;ch h&agrave;ng<\\/h4>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\"footer-menu\\">\\r\\n<ul>\\r\\n\\t<li><a href=\\"#\\">Ch&iacute;nh S&aacute;ch Thanh To&aacute;n<\\/a><\\/li>\\r\\n\\t<li><a href=\\"#\\">Ch&iacute;nh s&aacute;ch v\\u1eadn chuy\\u1ec3n<\\/a><\\/li>\\r\\n\\t<li><a href=\\"#\\">Ch&iacute;nh S&aacute;ch \\u0110\\u1ed5i Tr\\u1ea3<\\/a><\\/li>\\r\\n\\t<li><a href=\\"#\\">Ch&iacute;nh S&aacute;ch B\\u1ea3o H&agrave;nh<\\/a><\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<\\/div>","block4":"<div class=\\"res-text single-text\\">\\r\\n<div class=\\"footer-title\\">\\r\\n<h4>H\\u1ed7 tr\\u1ee3 kh&aacute;ch h&agrave;ng<\\/h4>\\r\\n<iframe frameborder=\\"0\\" height=\\"200\\" scrolling=\\"no\\" src=\\"https:\\/\\/www.facebook.com\\/plugins\\/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbepantoan.vn%2F&amp;tabs=timeline&amp;width=340&amp;height=200&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=804040979956496\\" style=\\"border:none;overflow:hidden\\" width=\\"340\\"><\\/iframe><\\/div>\\r\\n<\\/div>"}','created_at' => NULL,'updated_at' => '2019-12-03 08:04:13'),
            array('id' => '3','name' => 'hotline','key' => 'hotline','value' => '{"phone":"024 33 112 112","content":"Hotline"}','created_at' => NULL,'updated_at' => '2019-12-04 11:50:16'),
            array('id' => '4','name' => 'payment','key' => 'payment','value' => '[{"type":"fa fa-cc-visa"},{"type":"fa fa-cc-mastercard"},{"type":"fa fa-cc-paypal"},{"type":"fa fa-cc-discover"},{"type":"fa fa-cc-stripe"}]','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'social_network','key' => 'social_network','value' => '[{"type":"fa fa-facebook"},{"type":"fa fa-twitter"},{"type":"fa fa-google-plus"},{"type":"fa fa-instagram"}]','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'name_site','key' => 'general_name_site','value' => 'BepAnToan','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => 'desc_site','key' => 'general_description_site','value' => 'Bep an toan site','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => 'header_code','key' => 'general_header_code','value' => ' ','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','name' => 'footer_code','key' => 'general_footer_code','value' => ' ','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','name' => 'slide','key' => 'slide','value' => '[[{"type":null,"img_":"https:\\/\\/luongnd2286.xyz\\/userfiles\\/images\\/mua-bep-khuyen-mai-3-mobile(2).jpg"},{"type":null,"img_":"https:\\/\\/luongnd2286.xyz\\/userfiles\\/images\\/mua-bep-khuyen-mai-1-mobile(1).jpg"}]]','created_at' => NULL,'updated_at' => '2019-12-03 08:19:58'),
            array('id' => '11','name' => 'email_admin','key' => 'email_admin','value' => 'luongnd2286@gmail.com','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','name' => 'menu','key' => 'menu','value' => '[{"clss":"","icon":"pe-7s-shopbag","name":"Sản phẩm","link":"http://luongnd2286.xyz/danh-muc"},{"clss":"","icon":"pe-7s-news-paper","name":"Tin tức","link":"http://luongnd2286.xyz/tin-tuc"},{"clss":"","icon":"pe-7s-tools","name":"Dịch vụ","link":"http://luongnd2286.xyz/tin-dich-vu"},{"clss":"km","icon":"pe-7s-gift","name":"Khuyến mãi","link":"https://luongnd2286.xyz/khuyen-mai"}]','created_at' => NULL,'updated_at' => '2019-12-03 09:06:57'),
            array('id' => '13','name' => 'menu_phone','key' => 'menu_phone','value' => '[{"name":"Menu di \\u0111\\u1ed9ng","link":"link di \\u0111\\u1ed9ng","icon":"icon di \\u0111\\u1ed9ng","clss":"class di \\u0111\\u1ed9ng"},{"name":"Menu di \\u0111\\u1ed9ng  X","link":"Menu di \\u0111\\u1ed9ng Y","icon":"Menu di \\u0111\\u1ed9ng","clss":"Menu di \\u0111\\u1ed9ng"},{"name":"Menu di \\u0111\\u1ed9ng Y","link":null,"icon":null,"clss":null}]','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','name' => 'sale','key' => 'sale','value' => '<p>CHƯƠNG TR&Igrave;NH KHUYẾN M&Atilde;I</p>

                            <p>Giảm tới 10%</p>','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','name' => 'switchboard','key' => 'switchboard','value' => '{"phone":"024 33 112 112","content":"T\\u1ed5ng \\u0111\\u00e0i t\\u01b0 v\\u1ea5n"}','created_at' => NULL,'updated_at' => '2019-12-04 11:53:10'),
            array('id' => '16','name' => 'method_payment','key' => 'method_payment','value' => '','created_at' => NULL,'updated_at' => '2019-11-30 11:03:30'),
            array('id' => '17','name' => 'sidebar','key' => 'sidebar','value' => '[{"text":"Cam k\\u1ebft gi\\u00e1 t\\u1ed1t nh\\u1ea5t","icon":null},{"icon":null,"text":"Nh\\u1eadn \\u0111\\u1ed5i tr\\u1ea3 trong 30 ng\\u00e0y"},{"icon":null,"text":"B\\u1ea3o tr\\u00ec tr\\u1ecdn \\u0111\\u1eddi"},{"icon":null,"text":"L\\u1eafp \\u0111\\u1eb7t mi\\u1ec5n ph\\u00ed t\\u1ea1i H\\u00e0 N\\u1ed9i"},{"icon":null,"text":"Giao h\\u00e0ng to\\u00e0n qu\\u1ed1c"},{"icon":null,"text":"Thanh to\\u00e1n khi nh\\u1eadn h\\u00e0ng"}]','created_at' => NULL,'updated_at' => '2019-12-04 12:02:21'),
            array('id' => '18','name' => 'footer_copy','key' => 'footer_copy','value' => '{"footer":"Copyright 2019 - B\\u1ea3n quy\\u1ec1n c\\u1ee7a C\\u00f4ng ty BEPANTOAN.VN"}','created_at' => NULL,'updated_at' => '2019-12-03 08:08:01'),
            array('id' => '19','name' => 'introduce','key' => 'introduce','value' => '','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','name' => 'posts_per_page','key' => 'posts_per_page','value' => '8','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','name' => 'categories_show_home','key' => 'categories_show_home','value' => '','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','name' => 'Seo tiêu đề trang chủ','key' => 'seo_title_home','value' => '','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','name' => 'Seo mô tả trang chủ','key' => 'seo_description_home','value' => '','created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','name' => 'Seo từ khóa trang chủ','key' => 'seo_keyword_home','value' => '','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','name' => 'Chặn robot google trang chủ','key' => 'block_robot_google_home','value' => '','created_at' => NULL,'updated_at' => NULL),
            array('id' => '26','name' => 'Chặn robot google toàn trang','key' => 'block_robot_google','value' => '','created_at' => NULL,'updated_at' => NULL)
        );

        DB::table('options')->insert($options);

    }
}
