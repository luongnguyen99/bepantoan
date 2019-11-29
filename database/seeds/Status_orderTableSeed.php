<?php

use Illuminate\Database\Seeder;

class Status_orderTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('status_order')->count() == 0) {
            $status_order = array(
                array('id' => '1', 'name' => 'Chờ xử lý', 'created_at' => '2019-11-26 03:31:53', 'updated_at' => '2019-11-26 03:31:53'),
                array('id' => '2', 'name' => 'Đang giao hàng', 'created_at' => '2019-11-26 03:32:04', 'updated_at' => '2019-11-26 03:32:04'),
                array('id' => '3', 'name' => 'Hoàn thành đơn hàng', 'created_at' => '2019-11-26 03:32:13', 'updated_at' => '2019-11-26 03:32:13'),
                array('id' => '4', 'name' => 'Hủy đơn hàng', 'created_at' => '2019-11-26 03:32:19', 'updated_at' => '2019-11-26 03:32:19')
            );
            DB::table('status_order')->insert($status_order);
        }
    }
}
