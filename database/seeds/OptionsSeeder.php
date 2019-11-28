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
                'value' => 'http://luongnd2286.xyz/userfiles/images/logo-bepantoan.png',
            ],
            [
                'name' => 'footer',
                'key' => 'footer',
                'value' => '{"block1":"<div class=\"single-text res-text\">\r\n\t\t\t\t\t        <div class=\"footer-title\">\r\n\t\t\t\t\t            <div class=\"logo-f\">\r\n\t\t\t\t\t                <a href=\"#\">\r\n\t\t\t\t\t                    <img src=\"img\/logo-bepantoan.png\" alt=\"\"><\/a>\r\n\t\t\t\t\t            <\/div>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t        <div class=\"footer-text\">\r\n\t\t\t\t\t            <ul>\r\n\t\t\t\t\t                <li>\r\n\t\t\t\t\t                    <i class=\"pe-7s-call\"><\/i>\r\n\t\t\t\t\t                    <p>Mua h\u00e0ng <a href=\"#\"> 024 33 100 100<\/a> (7:00 - 20:00)<\/p>\r\n\t\t\t\t\t                <\/li>\r\n\t\t\t\t\t                <li>\r\n\t\t\t\t\t                    <i class=\"pe-7s-call\"><\/i>\r\n\t\t\t\t\t                    <p>B\u1ea3o h\u00e0nh <a href=\"#\"> 024 35 122 122 <\/a> (8:00 - 20:00)<\/p>\r\n\t\t\t\t\t                <\/li>\r\n\t\t\t\t\t                <li>\r\n\t\t\t\t\t                    <i class=\"pe-7s-call\"><\/i>\r\n\t\t\t\t\t                    <p>Khi\u1ebfu n\u1ea1i <a href=\"#\"> 0912 220 883<\/a> (8:00 - 20:30)<\/p>\r\n\t\t\t\t\t                <\/li>\r\n\t\t\t\t\t                <li>\r\n\t\t\t\t\t                    <img src=\"img\/icon-dangky.png\">\r\n\t\t\t\t\t                <\/li>\r\n\t\t\t\t\t            <\/ul>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t    <\/div>","block2":"<div class=\"single-text res-text\">\r\n\t\t\t\t\t        <div class=\"footer-title\">\r\n\t\t\t\t\t            <h4>Th\u00f4ng tin c\u00f4ng ty<\/h4>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t        <div class=\"footer-menu\">\r\n\t\t\t\t\t            <ul>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Gi\u1edbi thi\u1ec7u<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Tuy\u1ec3n d\u1ee5ng<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Quy ch\u1ebf ho\u1ea1t \u0111\u1ed9ng<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t            <\/ul>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t    <\/div>","block3":"<div class=\"single-text res-text\">\r\n\t\t\t\t\t        <div class=\"footer-title\">\r\n\t\t\t\t\t            <h4>H\u1ed7 tr\u1ee3 kh\u00e1ch h\u00e0ng<\/h4>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t        <div class=\"footer-menu\">\r\n\t\t\t\t\t            <ul>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Ch\u00ednh S\u00e1ch Thanh To\u00e1n<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Ch\u00ednh s\u00e1ch v\u1eadn chuy\u1ec3n<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Ch\u00ednh S\u00e1ch \u0110\u1ed5i Tr\u1ea3<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t                <li><a href=\"#\">Ch\u00ednh S\u00e1ch B\u1ea3o H\u00e0nh<\/a><\/li>\r\n\t\t\t\t\t                \r\n\t\t\t\t\t            <\/ul>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t    <\/div>","block4":"<div class=\"single-text res-text\">\r\n\t\t\t\t\t        <div class=\"footer-title\">\r\n\t\t\t\t\t            <h4>H\u1ed7 tr\u1ee3 kh\u00e1ch h\u00e0ng<\/h4>\r\n\t\t\t\t\t        <\/div>\r\n\t\t\t\t\t       \t<div class=\"fb-page\" data-href=\"https:\/\/www.facebook.com\/bepantoan.vn\/\" data-tabs=\"\" data-width=\"\" data-height=\"\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"true\"><blockquote cite=\"https:\/\/www.facebook.com\/bepantoan.vn\/\" class=\"fb-xfbml-parse-ignore\"><a href=\"https:\/\/www.facebook.com\/bepantoan.vn\/\">Bepantoan.vn<\/a><\/blockquote><\/div>\r\n\t\t\t\t\t    <\/div>"}',
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
                'value' => '[[{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/dmestik.jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/CHEFS.jpg"},{"type":null,"img_":"http:\/\/luongnd2286.xyz\/userfiles\/images\/bosch(1).jpg"}]]',
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
                'value' => '<p>Q&uacute;y kh&aacute;ch vui l&ograve;ng chuyển khoản v&agrave;o một trong c&aacute;c t&agrave;i khoản sau:</p>

                <p>( Nội dung chuyển tiền: HỌ T&Ecirc;N + SỐ ĐIỆN THOẠI + M&Atilde; SẢN PHẨM )</p>
                
                <p><strong>Ng&acirc;n h&agrave;ng TMCP Việt Nam Thịnh Vượng - VPbank</strong></p>
                
                <p><strong>Th&ocirc;ng tin c&aacute;c t&agrave;i khoản tại Beptot.vn!</strong></p>
                
                <p>NG&Acirc;N H&Agrave;NG TECHCOM BANK<br />
                - T&ecirc;n chủ TK: Nguyễn Đức Trường<br />
                - Số TK: 19027501510013<br />
                - Chi nh&aacute;nh: H&agrave; Nội</p>
                
                <p>NG&Acirc;N H&Agrave;NG VIETTIN BANK<br />
                - T&ecirc;n chủ TK: Nguyễn Đức Trường<br />
                - Số TK: 104000744394<br />
                -Chi nh&aacute;nh: H&agrave; Nội</p>
                
                <p>NG&Acirc;N H&Agrave;NG VIETCOM BANK<br />
                -T&ecirc;n chủ TK: Nguyễn Đức Trường<br />
                -Số TK: 0011004264765<br />
                -Chi nh&aacute;nh: H&agrave; Nội</p>',
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
                'value' => '{"banner":"http:\/\/luongnd2286.xyz\/userfiles\/images\/banner5.jpg","title_banner":"B\u1ebeP \u0110I\u1ec6N T\u1eea  CH\u1eacU V\u00d2I R\u1eecA CH\u00c9N B\u00c1T  M\u00c1Y R\u1eecA CH\u00c9N B\u00c1T  M\u00c1Y S\u1ea4Y CH\u00c9N B\u00c1T  THI\u1ebeT B\u1eca","img_introduce":"http:\/\/luongnd2286.xyz\/userfiles\/images\/showroom-bep-tot.jpg","content":"<h1>\u0110&Ocirc;I N&Eacute;T V\u1ec0&nbsp;<strong>BEPTOT.VN<\/strong><\/h1>\r\n\r\n<p>&nbsp;<\/p>\r\n\r\n<p>Tr\u1ea3i qua h\u01a1n 10 n\u0103m h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t tri\u1ec3n t\u1eeb kinh doanh c&aacute; th\u1ec3, v&agrave; \u0111\u01b0\u1ee3c s\u1ef1 tin c\u1eady c\u1ee7a ng\u01b0\u1eddi ti&ecirc;u d&ugrave;ng BEPTOT.VN \u0111&atilde; ch&iacute;nh th\u1ee9c \u0111i v&agrave;o ho\u1ea1t \u0111\u1ed9ng.<\/p>\r\n\r\n<p>L\u0129nh v\u1ef1c ho\u1ea1t \u0111\u1ed9ng kinh doanh v\u1ec1 :<\/p>\r\n\r\n<p>&nbsp;<\/p>\r\n\r\n<ul>\r\n\t<li>D\u1ecbch v\u1ee5 Gas &amp; B\u1ebfp gas<\/li>\r\n\t<li>S\u1eeda ch\u1eefa v&agrave; b\u1ea3o d\u01b0\u1ee1ng thi\u1ebft b\u1ecb ng&agrave;nh gas<\/li>\r\n\t<li>L\u1eafp \u0111\u1eb7t trang thi\u1ebft b\u1ecb h\u1ec7 th\u1ed1ng Gas c&ocirc;ng nghi\u1ec7p.<\/li>\r\n\t<li>Kinh doanh thi\u1ebft b\u1ecb nh&agrave; b\u1ebfp (B\u1ebfp gas &acirc;m - B\u1ebfp \u0111i\u1ec7n t\u1eeb - M&aacute;y h&uacute;t m&ugrave;i...)<\/li>\r\n<\/ul>\r\n\r\n<h1>&nbsp;<\/h1>\r\n\r\n<h1>&nbsp;<\/h1>\r\n\r\n<h1>&nbsp;<\/h1>\r\n\r\n<h1>QUAN \u0110I\u1ec2M&nbsp;<strong>KINH DOANH<\/strong><\/h1>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng l&agrave; gi&aacute; tr\u1ecb c\u01a1 b\u1ea3n c\u1ee7a b\u1ea5t k&igrave; doanh nghi\u1ec7p n&agrave;o \u0111&oacute; c\u0169ng l&agrave; l&yacute; do \u0111\u1ec3 doanh nghi\u1ec7p t\u1ed3n t\u1ea1i v&agrave; ph&aacute;t tri\u1ec3n. \u0110\u1ed1i v\u1edbi ch&uacute;ng t&ocirc;i kh&aacute;ch h&agrave;ng kh&ocirc;ng ch\u1ec9 l&agrave; Th\u01b0\u1ee3ng \u0110\u1ebf m&agrave; c&ograve;n l&agrave; nh\u1eefng ng\u01b0\u1eddi b\u1ea1n th&acirc;n thi\u1ebft, \u0111\u1ed3ng h&agrave;nh c&ugrave;ng v\u1edbi ch&uacute;ng t&ocirc;i trong qu&aacute; tr&igrave;nh ph&aacute;t tri\u1ec3n.<\/p>\r\n\r\n<p>S\u1eed d\u1ee5ng thi\u1ebft b\u1ecb nh&agrave; b\u1ebfp an to&agrave;n, ch\u1ea5t l\u01b0\u1ee3ng l&agrave; s\u1ef1 quan t&acirc;m h&agrave;ng \u0111\u1ea7u c\u1ee7a b\u1ea5t c\u1ee9 ng\u01b0\u1eddi n\u1ed9i tr\u1ee3 n&agrave;o. BEPTOT.VN l\u1eafng nghe, v&agrave; th\u1ea5u hi\u1ec3u nh\u1eefng nhu c\u1ea7u \u0111&oacute;.<\/p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i t&ocirc;n tr\u1ecdng kh&aacute;ch h&agrave;ng v&agrave; lu&ocirc;n n\u1ed7 l\u1ef1c ph&aacute;t tri\u1ec3n \u0111\u1ec3 \u0111&aacute;p \u1ee9ng t\u1ed1t nh\u1ea5t y&ecirc;u c\u1ea7u v\u1ec1 ch\u1ea5t l\u01b0\u1ee3ng v&agrave; s\u1ef1 tin t\u01b0\u1edfng c\u1ee7a kh&aacute;ch h&agrave;ng d&agrave;nh cho BEPTOT.VN trong su\u1ed1t th\u1eddi gian qua.<\/p>\r\n\r\n<p>\u0110\u1eb7t ph\u01b0\u01a1ng ch&acirc;m &ldquo;Ch\u1ea5t l\u01b0\u1ee3ng \u0111\u1ea3m b\u1ea3o, gi&aacute; th&agrave;nh h\u1ee3p l&yacute;&rdquo; v&agrave; uy t&iacute;n l&ecirc;n h&agrave;ng \u0111\u1ea7u.<\/p>\r\n\r\n<p>Nhi\u1ec1u n\u0103m qua BEPTOT.VN vinh d\u1ef1 \u0111\u01b0\u1ee3c ng\u01b0\u1eddi ti&ecirc;u d&ugrave;ng b&igrave;nh ch\u1ecdn l&agrave; m\u1ed9t trong nh\u1eefng \u0111\u1ecba ch\u1ec9 cung c\u1ea5p thi\u1ebft b\u1ecb nh&agrave; b\u1ebfp ch&iacute;nh h&atilde;ng, uy t&iacute;n v\u1edbi kh&aacute;ch h&agrave;ng s\u1eed d\u1ee5ng c\u0169ng nh\u01b0 l&agrave; \u0111\u1ea1i l&yacute; tin c\u1eady c\u1ee7a c&aacute;c h&atilde;ng s\u1ea3n xu\u1ea5t l\u1edbn tr&ecirc;n th\u1ebf gi\u1edbi.<\/p>","orientation":"\u0110\u1ecaNH H\u01af\u1edaNG PH\u00c1T TRI\u1ec2N","content2":"<p><img alt=\"\" src=\"https:\/\/beptot.vn\/img\/about\/testi1.jpg\" \/><\/p>\r\n\r\n<p>Lu&ocirc;n lu&ocirc;n gi\u1eef v\u1eefng uy t&iacute;n s\u1ef1 tin c\u1eady c\u1ee7a kh&aacute;ch h&agrave;ng d&agrave;nh cho BEPTOT.VN v&agrave; ng&agrave;y c&agrave;ng ph&aacute;t tri\u1ec3n ho&agrave;n thi\u1ec7n m&igrave;nh h\u01a1n n\u1eefa \u0111\u1ec3 ph\u1ee5c v\u1ee5 t\u1ed1t nh\u1ea5t cho kh&aacute;ch h&agrave;ng.<\/p>"}',
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
