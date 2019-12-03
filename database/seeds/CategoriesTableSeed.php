<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->count() == 0) {
            $categories = array(
                array('id' => '16', 'name' => 'Bếp điện - Bếp từ', 'slug' => 'bep-dien-bep-tu', 'parent_id' => '0', 'image' => 'http://luongnd2286.xyz/userfiles/images/smartna999-beptotx500x500x4.webp', 'created_at' => '2019-12-02 14:19:50', 'updated_at' => '2019-12-02 15:24:46'),
                array('id' => '17', 'name' => 'Bếp từ', 'slug' => 'bep-tu', 'parent_id' => '16', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bep-tu-bosch-puj631bb2ex500x500x4.webp', 'created_at' => '2019-12-02 14:20:14', 'updated_at' => '2019-12-02 15:26:58'),
                array('id' => '18', 'name' => 'Bếp điện', 'slug' => 'bep-dien', 'parent_id' => '16', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bep-dien-eurosun-eu-if268x500x500x4.webp', 'created_at' => '2019-12-02 14:20:42', 'updated_at' => '2019-12-02 15:26:14'),
                array('id' => '19', 'name' => 'Bếp điện từ', 'slug' => 'bep-dien-tu', 'parent_id' => '16', 'image' => 'http://luongnd2286.xyz/userfiles/images/smartna999-beptotx500x500x4.webp', 'created_at' => '2019-12-02 14:20:50', 'updated_at' => '2019-12-02 15:25:00'),
                array('id' => '20', 'name' => 'Bếp ga', 'slug' => 'bep-ga', 'parent_id' => '0', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bep-gas-am-rinnai-rvb-212bgx500x500x4(1).webp', 'created_at' => '2019-12-02 15:29:22', 'updated_at' => '2019-12-02 15:29:22'),
                array('id' => '21', 'name' => 'Bếp ga âm', 'slug' => 'bep-ga-am', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bep-gas-am-rinnai-rvb-212bgx500x500x4(1).webp', 'created_at' => '2019-12-02 15:30:24', 'updated_at' => '2019-12-02 15:30:33'),
                array('id' => '22', 'name' => 'Bếp ga dương', 'slug' => 'bep-ga-duong', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-doi-mat-kinh-viet-nhatx500x500x4.webp', 'created_at' => '2019-12-02 15:31:38', 'updated_at' => '2019-12-02 15:31:38'),
                array('id' => '23', 'name' => 'BẾP GAS ÂM HỒNG NGOẠI', 'slug' => 'bep-gas-am-hong-ngoai', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-am-hong-ngoai-kaff-kf-6081ix500x500x4.webp', 'created_at' => '2019-12-02 15:33:52', 'updated_at' => '2019-12-02 15:33:52'),
                array('id' => '24', 'name' => 'BẾP GAS DƯƠNG HỒNG NGOẠI', 'slug' => 'bep-gas-duong-hong-ngoai', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-duong-redsun-rs-928kx500x500x4.webp', 'created_at' => '2019-12-02 15:35:34', 'updated_at' => '2019-12-02 15:35:34'),
                array('id' => '25', 'name' => 'BẾP GAS GIÁ RẺ', 'slug' => 'bep-gas-gia-re', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-duong-rinnai-rv-365gx500x500x4.webp', 'created_at' => '2019-12-02 15:36:41', 'updated_at' => '2019-12-02 15:36:41'),
                array('id' => '26', 'name' => 'BẾP GAS CÔNG NGHIỆP| BẾP GAS NHÀ HÀNG, KHÁCH SẠN', 'slug' => 'bep-gas-cong-nghiep-bep-gas-nha-hang-khach-san', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-cong-nghiep-viet-namx500x500x4.webp', 'created_at' => '2019-12-02 15:37:23', 'updated_at' => '2019-12-02 15:37:31'),
                array('id' => '27', 'name' => 'BẾP GAS KẾT HỢP ĐIỆN TỪ', 'slug' => 'bep-gas-ket-hop-dien-tu', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bep-gas-am-ket-hop-dien-faster-fs-921sttgx500x500x4.webp', 'created_at' => '2019-12-02 15:39:15', 'updated_at' => '2019-12-02 15:39:15'),
                array('id' => '28', 'name' => 'BẾP VÀ BÌNH GAS', 'slug' => 'bep-va-binh-gas', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bo-binh-gas-petrovietnam-12kgx500x500x4.webp', 'created_at' => '2019-12-02 15:40:50', 'updated_at' => '2019-12-02 15:40:50'),
                array('id' => '29', 'name' => 'BẾP GAS ĐƠN', 'slug' => 'bep-gas-don', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-don-namilux-na-300asmx500x500x4.webp', 'created_at' => '2019-12-02 15:41:31', 'updated_at' => '2019-12-02 15:41:31'),
                array('id' => '30', 'name' => 'BẾP GAS DU LỊCH', 'slug' => 'bep-gas-du-lich', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/bep-gas-bep-gas-du-lich-namilux-na-243pnx500x500x4.webp', 'created_at' => '2019-12-02 15:42:37', 'updated_at' => '2019-12-02 15:42:37'),
                array('id' => '31', 'name' => 'BÌNH GAS & LINH KIỆN', 'slug' => 'binh-gas-linh-kien', 'parent_id' => '20', 'image' => 'http://luongnd2286.xyz/userfiles/images/715335-500x500x500x500x4.webp', 'created_at' => '2019-12-02 15:43:06', 'updated_at' => '2019-12-02 15:44:11')
            );

            DB::table('categories')->insert($categories);
        }
    }
}
