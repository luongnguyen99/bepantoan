<?php

use Illuminate\Database\Seeder;

class Branch_phuthuyxam_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('brands')->count() == 0) {
            $brands = array(
                array('id' => '1', 'name' => 'Sun house', 'slug' => 'sun-house', 'image' => 'http://luongnd2286.xyz/userfiles/images/logo-bepantoan.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '2', 'name' => 'Elmic', 'slug' => 'elmic', 'image' => 'http://luongnd2286.xyz/userfiles/images/20190227151444_logo-tuyen-dung.png', 'created_at' => NULL, 'updated_at' => NULL)
            );
            DB::table('brands')->insert($brands);
        }
    }
}
