<?php

use Illuminate\Database\Seeder;

class Property_valuesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('property_values')->count() == 0) {
            $property_values = array(
                array('id' => '1', 'name' => 'Anh', 'slug' => 'anh', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '2', 'name' => 'Việt', 'slug' => 'viet', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '3', 'name' => 'Mỹ', 'slug' => 'my', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '4', 'name' => 'Việt Nam', 'slug' => 'viet-nam', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '5', 'name' => 'China', 'slug' => 'china', 'property_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '6', 'name' => '1 bếp', 'slug' => '1-bep', 'property_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '7', 'name' => '2 bếp', 'slug' => '2-bep', 'property_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '8', 'name' => '3 bếp', 'slug' => '3-bep', 'property_id' => '2', 'created_at' => NULL, 'updated_at' => NULL)
            );
            DB::table('property_values')->insert($property_values);
        }
    }
}
