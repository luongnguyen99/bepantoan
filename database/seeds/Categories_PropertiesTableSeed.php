<?php

use Illuminate\Database\Seeder;

class Categories_PropertiesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories_properties')->count() == 0) {
            $categories_properties = array(
                array('id' => '1', 'category_id' => '1', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '2', 'category_id' => '2', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '3', 'category_id' => '3', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '4', 'category_id' => '1', 'property_id' => '2', 'created_at' => NULL, 'updated_at' => NULL)
            );
            DB::table('categories_properties')->insert($categories_properties);
        }
    }
}
