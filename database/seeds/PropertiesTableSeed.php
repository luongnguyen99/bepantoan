<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('properties')->count() == 0) {
            $properties = array(
                array('id' => '1','name' => 'Xuất sứ','slug' => 'xuat-su','created_at' => NULL,'updated_at' => '2019-11-21 00:43:34'),
                array('id' => '2','name' => 'Số bếp','slug' => 'so-bep','created_at' => NULL,'updated_at' => '2019-11-26 03:17:57'),
                array('id' => '3','name' => 'Phân loại','slug' => 'phan-loai','created_at' => NULL,'updated_at' => NULL),
                array('id' => '4','name' => 'Công Suất','slug' => 'cong-suat','created_at' => NULL,'updated_at' => NULL),
                array('id' => '5','name' => 'Chất Liệu','slug' => 'chat-lieu','created_at' => NULL,'updated_at' => NULL),
                array('id' => '10','name' => 'Số Bộ','slug' => 'so-bo','created_at' => NULL,'updated_at' => NULL),
                array('id' => '11','name' => 'Dung Tích','slug' => 'dung-tich','created_at' => NULL,'updated_at' => NULL),
                array('id' => '12','name' => 'Kích Thước','slug' => 'kich-thuoc','created_at' => NULL,'updated_at' => NULL)
                );
            DB::table('properties')->insert($properties);
        }
    }
}
