<?php

use Illuminate\Database\Seeder;

class Products_property_valuesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('products_property_values')->count() == 0) {
            $products_property_values = array(
                array('id' => '1', 'product_id' => '1', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '2', 'product_id' => '3', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '3', 'product_id' => '4', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '4', 'product_id' => '5', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '5', 'product_id' => '6', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '6', 'product_id' => '7', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '7', 'product_id' => '8', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '8', 'product_id' => '9', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '9', 'product_id' => '10', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '10', 'product_id' => '11', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '13', 'product_id' => '14', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '14', 'product_id' => '15', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '15', 'product_id' => '16', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '16', 'product_id' => '17', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '17', 'product_id' => '18', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '18', 'product_id' => '19', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '19', 'product_id' => '20', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '20', 'product_id' => '21', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '21', 'product_id' => '22', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '22', 'product_id' => '23', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '23', 'product_id' => '24', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '24', 'product_id' => '25', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '25', 'product_id' => '26', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '26', 'product_id' => '27', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '28', 'product_id' => '28', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '30', 'product_id' => '30', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '31', 'product_id' => '31', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '32', 'product_id' => '32', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '33', 'product_id' => '33', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '34', 'product_id' => '34', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '35', 'product_id' => '35', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '36', 'product_id' => '36', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '37', 'product_id' => '37', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '38', 'product_id' => '38', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '43', 'product_id' => '42', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '46', 'product_id' => '29', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '49', 'product_id' => '40', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '50', 'product_id' => '40', 'property_value_id' => '6', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '57', 'product_id' => '39', 'property_value_id' => '2', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '58', 'product_id' => '39', 'property_value_id' => '8', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '71', 'product_id' => '41', 'property_value_id' => '1', 'created_at' => NULL, 'updated_at' => NULL)
            );
            DB::table('products_property_values')->insert($products_property_values);
        }
    }
}
