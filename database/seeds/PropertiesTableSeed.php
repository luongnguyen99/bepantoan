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
                array('id' => '1', 'name' => 'Xuất sứ', 'slug' => 'xuat-su', 'created_at' => NULL, 'updated_at' => '2019-11-21 00:43:34'),
                array('id' => '2', 'name' => 'Số bếp', 'slug' => 'so-bep', 'created_at' => NULL, 'updated_at' => '2019-11-26 03:17:57')
            );
            DB::table('properties')->insert($properties);
        }
    }
}
