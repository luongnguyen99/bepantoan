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
                array('id' => '1', 'name' => 'Bếp Ga', 'slug' => 'bep-ga', 'parent_id' => '0', 'image' => 'http://luongnd2286.xyz/userfiles/images/large_bep-gas-am-rinnai-rvb-212bgx500x500x4.webp', 'created_at' => '2019-11-21 00:44:02', 'updated_at' => '2019-11-25 01:23:53'),
                array('id' => '2', 'name' => 'Bếp từ', 'slug' => 'bep-tu', 'parent_id' => '0', 'image' => 'http://luongnd2286.xyz/userfiles/images/smartna999-beptotx500x500x4.webp', 'created_at' => '2019-11-21 00:44:21', 'updated_at' => '2019-11-21 00:44:21'),
                array('id' => '3', 'name' => 'Nồi niêu xoong chảo', 'slug' => 'noi-nieu-xoong-chao', 'parent_id' => '0', 'image' => 'http://luongnd2286.xyz/userfiles/images/bo-noi-chefs-eh-cw4304x500x500x4.webp', 'created_at' => '2019-11-21 00:45:01', 'updated_at' => '2019-11-25 01:40:22')
            );

            DB::table('categories')->insert($categories);
        }
    }
}
