<?php

use Illuminate\Database\Seeder;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('products')->count() < 1) {

            $products = array(
                array('id' => '1', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF268', 'slug' => 'bep-hong-ngoai-doi-eu-if268', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:15', 'updated_at' => '2019-11-21 00:55:15'),
                                    array('id' => '3', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681112', 'slug' => 'bep-hong-ngoai-doi-eu-if2681112', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '4', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681113', 'slug' => 'bep-hong-ngoai-doi-eu-if2681113', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '5', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681114', 'slug' => 'bep-hong-ngoai-doi-eu-if2681114', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '6', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681115', 'slug' => 'bep-hong-ngoai-doi-eu-if2681115', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '7', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681116', 'slug' => 'bep-hong-ngoai-doi-eu-if2681116', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '8', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681117', 'slug' => 'bep-hong-ngoai-doi-eu-if2681117', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '9', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681118', 'slug' => 'bep-hong-ngoai-doi-eu-if2681118', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '10', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681119', 'slug' => 'bep-hong-ngoai-doi-eu-if2681119', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '11', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681120', 'slug' => 'bep-hong-ngoai-doi-eu-if2681120', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '14', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681123', 'slug' => 'bep-hong-ngoai-doi-eu-if2681123', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '15', 'name' => 'BẾP HỒNG NGOẠI ĐÔI EU-IF2681124', 'slug' => 'bep-hong-ngoai-doi-eu-if2681124', 'category_id' => '2', 'brand_id' => '1', 'price' => '9680000', 'sale_price' => '6680000', 'gift' => '{"9999":{"value":"T\\u1eb7ng B\\u1ed9 n\\u1ed3i t\\u1eeb Fivestar 3 chi\\u1ebfc tr\\u1ecb gi\\u00e1 1.000.000 \\u0111"}}', 'description' => '<p>&nbsp;</p>

                    <p>Bếp hồng ngoại Eurosun EU-IF268</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Loại bếp : Bếp hồng ngoại</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p>- Danh mục: Bếp hồng ngoại Eurosun</p>', 'infomation_detail' => '<h3>Th&ocirc;ng tin chi tiết:</h3>

                    <p><a href="https://beptot.vn/eurosun-bep-dien-bep-tu">Bếp điện từ EUROSUN</a>&nbsp;l&agrave; d&ograve;ng sản phẩm đang được c&aacute;c b&agrave; nội trợ tin d&ugrave;ng &nbsp;nhất hiện nay với thiết kế 3 l&ograve; 2 từ 1 điện, hiện đại th&ocirc;ng minh mang đến sự tiện lợi cho người sử dụng, bếp nấu cực kỳ nhanh v&agrave; đảm bảo an to&agrave;n si&ecirc;u tiết kiệm điện năng bếp th&acirc;n thiện với m&ocirc;i trường n&ecirc;n đang được thị trường quan t&acirc;m đến, bếp điện từ &nbsp;với 2 b&ecirc;n l&ograve; nấu c&ocirc;ng suất đều 2000w v&agrave; v&ugrave;ng nấu giữa la 1500w cả 3 bếp đều nấu cực kỳ nhanh, mặt k&iacute;nh l&agrave;m bằng SCHOTT CERAN d&ograve;ng k&iacute;nh c&oacute; khả năng chịu nhiệt cao chống chầy xước dễ lau ch&ugrave;i vệ sinh khi đun nấu sản phẩm với t&iacute;nh năng tốt như vậy th&igrave; chỉ c&oacute;&nbsp;<a href="https://beptot.vn/eurosun-bep-dien-bep-tu">bếp đi&ecirc;n</a>&nbsp;EUROSUN muốn c&oacute; sản phẩm chất lượng gi&aacute; mềm h&atilde;y đến với Beptot.vn</p>

                    <h3>SHOWROOM BEPTOT.VN ĐƯỜNG L&Aacute;NG</h3>

                    <p><strong>Địa chỉ:&nbsp;</strong>330 Đường L&aacute;ng - Đống Đa - H&agrave; Nội ( C&oacute; Chỗ Để Xe &Ocirc; T&ocirc; )&nbsp;<br />
                    <strong>Hotline:&nbsp;</strong><strong><a href="tel:024 33 100 100">024 33 100 100</a>&nbsp;-&nbsp;<a href="tel:0986 083 083">0986 083 083</a></strong></p>

                    <p>Th&ocirc;ng số kỹ thuật:</p>

                    <p>- 2 v&ugrave;ng nấu hồng ngoại<br />
                    - Mặt k&iacute;nh VITTROCERAMIC Made in Germany<br />
                    - C&ocirc;ng nghệ mới tiết kiệm &gt;35% điện năng<br />
                    - Điều khiển cảm ứng trượt 9 mức gia nhiệt<br />
                    - Tự nhận diện v&ugrave;ng nấu<br />
                    - Hẹn giờ &nbsp;99 ph&uacute;t<br />
                    - Chức năng k&iacute;ch hoạt c&ocirc;ng suất &quot;Super Booster&quot; si&ecirc;u nhanh<br />
                    - Chức năng biến tần INVERTER<br />
                    - Chức năng cảm ứng chống tr&agrave;n<br />
                    - Ph&iacute;m khởi động an to&agrave;n<br />
                    - Tự động tắt khi xoong nồi rời v&ugrave;ng nấu<br />
                    - Kiểm so&aacute;t nhiệt độ trong v&ugrave;ng nấu<br />
                    - Hệ thống &nbsp;bảo &nbsp;vệ an to&agrave;n khi &nbsp;qu&aacute; nhiệt, qu&aacute; &nbsp;&aacute;p<br />
                    - Kho&aacute; trẻ em<br />
                    - C&ocirc;ng suất l&ograve; tr&aacute;i : 2200W<br />
                    - C&ocirc;ng suất l&ograve; phải: 2200W<br />
                    - K&iacute;ch thước sản phẩm: 730R x 430S x 67C mm<br />
                    - K&iacute;ch thước kho&eacute;t đ&aacute;: 680W x 390D mm&nbsp;</p>', 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 00:55:50', 'updated_at' => '2019-11-21 00:55:50'),
                                    array('id' => '16', 'name' => 'BỘ NỒI CHEFS EH-CW430412', 'slug' => 'bo-noi-chefs-eh-cw430412', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '17', 'name' => 'BỘ NỒI CHEFS EH-CW430413', 'slug' => 'bo-noi-chefs-eh-cw430413', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '18', 'name' => 'BỘ NỒI CHEFS EH-CW430414', 'slug' => 'bo-noi-chefs-eh-cw430414', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '19', 'name' => 'BỘ NỒI CHEFS EH-CW430415', 'slug' => 'bo-noi-chefs-eh-cw430415', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '20', 'name' => 'BỘ NỒI CHEFS EH-CW430416', 'slug' => 'bo-noi-chefs-eh-cw430416', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '21', 'name' => 'BỘ NỒI CHEFS EH-CW430417', 'slug' => 'bo-noi-chefs-eh-cw430417', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '22', 'name' => 'BỘ NỒI CHEFS EH-CW430418', 'slug' => 'bo-noi-chefs-eh-cw430418', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '23', 'name' => 'BỘ NỒI CHEFS EH-CW430419', 'slug' => 'bo-noi-chefs-eh-cw430419', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '24', 'name' => 'BỘ NỒI CHEFS EH-CW430420', 'slug' => 'bo-noi-chefs-eh-cw430420', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '25', 'name' => 'BỘ NỒI CHEFS EH-CW430421', 'slug' => 'bo-noi-chefs-eh-cw430421', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '26', 'name' => 'BỘ NỒI CHEFS EH-CW430422', 'slug' => 'bo-noi-chefs-eh-cw430422', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '27', 'name' => 'BỘ NỒI CHEFS EH-CW430423', 'slug' => 'bo-noi-chefs-eh-cw430423', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => '1500000', 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 00:57:47'),
                                    array('id' => '28', 'name' => 'BỘ NỒI CHEFS EH-CW430424', 'slug' => 'bo-noi-chefs-eh-cw430424', 'category_id' => '3', 'brand_id' => '2', 'price' => '2750000', 'sale_price' => NULL, 'gift' => '{"9999":{"value":"1324"}}', 'description' => '<p>M&atilde; h&agrave;ng: EH-CW4304 Số lượng nồi: 4 chiếc Chất liệu Inox 304 Bảo h&agrave;nh: 3 th&aacute;ng Xuất xứ: Việt Nam</p>', 'infomation_detail' => '<p>&ndash;&ndash; Sử dụng inox 3 lớp multilayer, d&agrave;y 2.5mm<br />
                    &ndash; Lớp ngo&agrave;i c&ugrave;ng inox430 sử dụng cho bếp từ.<br />
                    &ndash; Lớp giữa l&agrave; nh&ocirc;m, dẫn nhiệt lan tỏa từ đ&aacute;y đến th&agrave;nh nồi.<br />
                    &ndash; Lớp trong l&agrave; inox 18/10 ph&ugrave; hợp an to&agrave;n thực phẩm<br />
                    &ndash; Nắp inox b&oacute;ng gương sang trọng<br />
                    &ndash; Tay cầm oval, SUS202<br />
                    &ndash; M&agrave;u sắc: xanh cốm<br />
                    &ndash; Sử dụng ph&ugrave; hợp với bếp điện từ<br />
                    &ndash; Tiết kiệm năng lượng tối ưu</p>', 'specifications' => '{"9999":{"key":"abc","value":"abac"}}', 'status' => '1', 'created_at' => '2019-11-21 00:57:47', 'updated_at' => '2019-11-21 01:00:40'),
                array('id' => '29', 'name' => 'Bếp Ga12', 'slug' => 'bep-ga12', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => NULL, 'gift' => '{"1332":{"value":"Kh\\u00f4ng c\\u00f3 g\\u00ec \\u0111\\u00e2u"},"9135":{"value":"\\u0110\\u00e3 sale r\\u1ed3i c\\u00f2n \\u0111\\u00f2i qu\\u00e0"}}', 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 02:37:20'),
                array('id' => '30', 'name' => 'Bếp Ga13', 'slug' => 'bep-ga13', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '31', 'name' => 'Bếp Ga14', 'slug' => 'bep-ga14', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '32', 'name' => 'Bếp Ga15', 'slug' => 'bep-ga15', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '33', 'name' => 'Bếp Ga16', 'slug' => 'bep-ga16', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '34', 'name' => 'Bếp Ga17', 'slug' => 'bep-ga17', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '35', 'name' => 'Bếp Ga18', 'slug' => 'bep-ga18', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '36', 'name' => 'Bếp Ga19', 'slug' => 'bep-ga19', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '37', 'name' => 'Bếp Ga20', 'slug' => 'bep-ga20', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '38', 'name' => 'Bếp Ga21', 'slug' => 'bep-ga21', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => '123123', 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-21 01:01:30'),
                array('id' => '39', 'name' => 'Bếp Ga22', 'slug' => 'bep-ga22', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => NULL, 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-25 01:27:44'),
                array('id' => '40', 'name' => 'Bếp Ga23', 'slug' => 'bep-ga23', 'category_id' => '1', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => NULL, 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-25 01:27:13'),
                array('id' => '41', 'name' => 'Bếp Ga24', 'slug' => 'bep-ga', 'category_id' => '3', 'brand_id' => '1', 'price' => '123123123', 'sale_price' => NULL, 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:01:30', 'updated_at' => '2019-11-28 04:38:59'),
                array('id' => '42', 'name' => '123', 'slug' => '123', 'category_id' => '2', 'brand_id' => '2', 'price' => '123', 'sale_price' => NULL, 'gift' => NULL, 'description' => NULL, 'infomation_detail' => NULL, 'specifications' => NULL, 'status' => '1', 'created_at' => '2019-11-21 01:17:38', 'updated_at' => '2019-11-21 01:19:59')
            );
        DB::table('products')->insert($products);
        };

    }
}
