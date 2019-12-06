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
                array('id' => '8','category_id' => '18','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '9','category_id' => '18','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '10','category_id' => '17','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '11','category_id' => '17','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '12','category_id' => '17','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '13','category_id' => '19','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '14','category_id' => '19','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '15','category_id' => '19','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '16','category_id' => '16','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '17','category_id' => '16','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '18','category_id' => '16','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '19','category_id' => '31','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '20','category_id' => '31','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '21','category_id' => '31','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '22','category_id' => '29','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '23','category_id' => '29','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '24','category_id' => '29','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '25','category_id' => '28','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '26','category_id' => '28','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '27','category_id' => '28','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '28','category_id' => '27','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '29','category_id' => '27','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '30','category_id' => '27','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '31','category_id' => '26','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '32','category_id' => '26','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '33','category_id' => '26','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '34','category_id' => '25','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '35','category_id' => '25','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '36','category_id' => '25','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '37','category_id' => '24','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '38','category_id' => '24','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '39','category_id' => '24','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '40','category_id' => '23','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '41','category_id' => '23','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                array('id' => '42','category_id' => '23','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '43','category_id' => '32','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '45','category_id' => '32','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '46','category_id' => '36','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '48','category_id' => '36','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '49','category_id' => '35','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '51','category_id' => '35','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '52','category_id' => '34','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '54','category_id' => '34','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '55','category_id' => '33','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '57','category_id' => '33','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '58','category_id' => '37','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '60','category_id' => '37','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                array('id' => '61','category_id' => '39','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '63','category_id' => '39','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                array('id' => '64','category_id' => '38','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '66','category_id' => '38','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                array('id' => '67','category_id' => '40','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '68','category_id' => '40','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                array('id' => '69','category_id' => '41','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '70','category_id' => '41','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                array('id' => '77','category_id' => '46','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '78','category_id' => '46','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                array('id' => '79','category_id' => '47','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '80','category_id' => '47','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                array('id' => '81','category_id' => '48','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '83','category_id' => '48','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                array('id' => '84','category_id' => '52','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '86','category_id' => '55','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '88','category_id' => '54','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '90','category_id' => '53','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '92','category_id' => '56','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '93','category_id' => '58','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '94','category_id' => '57','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '95','category_id' => '59','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '97','category_id' => '61','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '99','category_id' => '60','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '101','category_id' => '51','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '102','category_id' => '51','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                array('id' => '103','category_id' => '50','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '104','category_id' => '49','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '105','category_id' => '49','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                array('id' => '106','category_id' => '42','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '107','category_id' => '42','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '108','category_id' => '44','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '109','category_id' => '44','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '110','category_id' => '43','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '111','category_id' => '43','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '112','category_id' => '56','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '113','category_id' => '58','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '114','category_id' => '57','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '115','category_id' => '32','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                array('id' => '116','category_id' => '36','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                array('id' => '117','category_id' => '35','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                array('id' => '118','category_id' => '34','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                array('id' => '119','category_id' => '33','property_id' => '12','created_at' => NULL,'updated_at' => NULL)
            );

            DB::table('categories_properties')->insert($categories_properties);
        }
    }
}
