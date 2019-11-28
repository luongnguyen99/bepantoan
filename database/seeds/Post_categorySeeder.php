<?php

use Illuminate\Database\Seeder;

class Post_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->delete();
        DB::table('post_categories')->insert([
            [
                'id'=> 1,
                'name' => 'Góc tư vấn',
                'slug' => 'goc-tu-van',
            ],
            [
                'id'=> 2,
                'name' => 'Khuyến mãi',
                'slug' => 'khuyen-mai',
            ],
            [
                'id'=> 3,
                'name' => 'Tin dịch vụ',
                'slug' => 'tin-dich-vu',
            ],
        ]);
    }
}
