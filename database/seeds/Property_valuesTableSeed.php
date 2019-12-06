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
                    array('id' => '1','name' => 'Anh','slug' => 'anh','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '2','name' => 'Việt','slug' => 'viet','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '3','name' => 'Mỹ','slug' => 'my','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '4','name' => 'Việt Nam','slug' => 'viet-nam','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '5','name' => 'China','slug' => 'china','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '6','name' => '1 bếp','slug' => '1-bep','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '7','name' => '2 bếp','slug' => '2-bep','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '8','name' => '3 bếp','slug' => '3-bep','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '9','name' => 'bếp từ','slug' => 'bep-tu','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '10','name' => 'Bếp điện','slug' => 'bep-dien','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '11','name' => 'Bếp điện từ','slug' => 'bep-dien-tu','property_id' => '3','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '12','name' => '4 bếp','slug' => '4-bep','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '13','name' => '5 bếp','slug' => '5-bep','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '14','name' => '6 bếp','slug' => '6-bep','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '15','name' => 'Bếp đa điểm','slug' => 'bep-da-diem','property_id' => '2','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '16','name' => 'Spain','slug' => 'spain','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '17','name' => 'EU','slug' => 'eu','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '18','name' => 'Japan','slug' => 'japan','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '19','name' => 'Korea','slug' => 'korea','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '20','name' => 'Thailand','slug' => 'thailand','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '21','name' => 'Poland','slug' => 'poland','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '22','name' => 'France','slug' => 'france','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '23','name' => 'Malaysia','slug' => 'malaysia','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '24','name' => 'Italy','slug' => 'italy','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '25','name' => 'Germany','slug' => 'germany','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '26','name' => 'Thụy Điển','slug' => 'thuy-dien','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '27','name' => 'England','slug' => 'england','property_id' => '1','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '28','name' => '< 500 m3/h','slug' => '-500-m3h','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '29','name' => '500 - 1000 m3/h','slug' => '500---1000-m3h','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '30','name' => '> 1000 m3/h','slug' => '-1000-m3h','property_id' => '4','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '31','name' => 'SUS201','slug' => 'sus201','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '32','name' => 'SUS304','slug' => 'sus304','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '33','name' => 'SUS430','slug' => 'sus430','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '34','name' => 'Đồng mạ chrome','slug' => 'dong-ma-chrome','property_id' => '5','created_at' => NULL,'updated_at' => '2019-12-05 16:43:46'),
                    array('id' => '35','name' => 'Đá Granite','slug' => 'da-granite','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '36','name' => 'Đồng mạ Vibran PVD','slug' => 'dong-ma-vibran-pvd','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '37','name' => 'Chrome, men đen','slug' => 'chrome-men-den','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '38','name' => 'SUS304 + Kính cường lực','slug' => 'sus304-kinh-cuong-luc','property_id' => '5','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '39','name' => '6 bộ','slug' => '6-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '40','name' => '8 bộ','slug' => '8-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '41','name' => '9 bộ','slug' => '9-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '42','name' => '10 bộ','slug' => '10-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '43','name' => '12 bộ','slug' => '12-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '44','name' => '14 bộ','slug' => '14-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '45','name' => '15 bộ','slug' => '15-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '46','name' => '13 bộ','slug' => '13-bo','property_id' => '10','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '47','name' => '< 20 Lít','slug' => '-20-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '48','name' => '20 Lít','slug' => '20-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '49','name' => '21 Lít','slug' => '21-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '50','name' => '25 Lít','slug' => '25-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '51','name' => '40 Lít','slug' => '40-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '52','name' => '45 Lít','slug' => '45-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '53','name' => '51 Lít','slug' => '51-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '54','name' => '59 Lít','slug' => '59-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '55','name' => '60 Lít','slug' => '60-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '56','name' => '65 Lít','slug' => '65-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '57','name' => '70 Lít','slug' => '70-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '58','name' => '74 Lít','slug' => '74-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '59','name' => '36 Lít','slug' => '36-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '60','name' => '42 Lít','slug' => '42-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '61','name' => '67 Lít','slug' => '67-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '62','name' => '71 Lít','slug' => '71-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '63','name' => '66 Lít','slug' => '66-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '64','name' => '62 Lít','slug' => '62-lit','property_id' => '11','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '65','name' => '600 mm','slug' => '600-mm','property_id' => '12','created_at' => NULL,'updated_at' => '2019-12-05 17:28:17'),
                    array('id' => '66','name' => '700 mm','slug' => '700-mm','property_id' => '12','created_at' => NULL,'updated_at' => '2019-12-05 17:28:24'),
                    array('id' => '67','name' => '800 mm','slug' => '800-mm','property_id' => '12','created_at' => NULL,'updated_at' => '2019-12-05 17:28:38'),
                    array('id' => '68','name' => '900 mm','slug' => '900-mm','property_id' => '12','created_at' => NULL,'updated_at' => '2019-12-05 17:28:48'),
                    array('id' => '69','name' => '1200 mm','slug' => '1200-mm','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '70','name' => 'Đặc Biệt','slug' => 'dac-biet','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '71','name' => '1000 mm','slug' => '1000-mm','property_id' => '12','created_at' => NULL,'updated_at' => NULL),
                    array('id' => '72','name' => '1100 mm','slug' => '1100-mm','property_id' => '12','created_at' => NULL,'updated_at' => NULL)
                    );

            DB::table('property_values')->insert($property_values);
        }
    }
}
