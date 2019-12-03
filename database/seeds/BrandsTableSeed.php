<?php

use Illuminate\Database\Seeder;

class BrandsTableSeed extends Seeder
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
                array('id' => '1', 'name' => 'Bosch', 'slug' => 'bosch', 'image' => 'http://luongnd2286.xyz/userfiles/images/logo%20bosch.jpg', 'created_at' => NULL, 'updated_at' => '2019-11-29 17:21:22'),
                array('id' => '2', 'name' => 'Rinnai', 'slug' => 'rinnai', 'image' => 'http://luongnd2286.xyz/userfiles/images/Rinnai.png', 'created_at' => NULL, 'updated_at' => '2019-11-29 17:20:34'),
                array('id' => '3', 'name' => 'Brandt', 'slug' => 'brandt', 'image' => 'http://luongnd2286.xyz/userfiles/images/Brandt.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '4', 'name' => 'Catac', 'slug' => 'catac', 'image' => 'http://luongnd2286.xyz/userfiles/images/Cata.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '5', 'name' => 'Chefs', 'slug' => 'chefs', 'image' => 'http://luongnd2286.xyz/userfiles/images/chefs.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '6', 'name' => 'Kanggaroo', 'slug' => 'kanggaroo', 'image' => 'http://luongnd2286.xyz/userfiles/images/Kangaroo.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '7', 'name' => 'BInova', 'slug' => 'binova', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Binova.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '8', 'name' => 'Canzy', 'slug' => 'canzy', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/canzy.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '9', 'name' => 'Dmestik', 'slug' => 'dmestik', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Dmestik.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '10', 'name' => 'Dudoff', 'slug' => 'dudoff', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Dudoff.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '11', 'name' => 'Electrolex', 'slug' => 'electrolex', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/electrolux.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '12', 'name' => 'Elica', 'slug' => 'elica', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Elica.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '13', 'name' => 'Eurosun', 'slug' => 'eurosun', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/eurosun(1).jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '14', 'name' => 'Sevilla', 'slug' => 'sevilla', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Evilla.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '15', 'name' => 'Faber', 'slug' => 'faber', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/faber.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '16', 'name' => 'Fagor', 'slug' => 'fagor', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/fagor.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '17', 'name' => 'Faster', 'slug' => 'faster', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/faster.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '18', 'name' => 'Giovani', 'slug' => 'giovani', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Giovani.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '19', 'name' => 'HAFELE', 'slug' => 'hafele', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Hafele.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '20', 'name' => 'Malloca', 'slug' => 'malloca', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/malloca.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '21', 'name' => 'Naopoliz', 'slug' => 'naopoliz', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/napoliz.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '22', 'name' => 'Roviga', 'slug' => 'roviga', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Rovigo.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '23', 'name' => 'Sunhouse', 'slug' => 'sunhouse', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/sunhouse.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '24', 'name' => 'Taka', 'slug' => 'taka', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/taka.png', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '25', 'name' => 'Teka', 'slug' => 'teka', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/teka.jpg', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '26', 'name' => 'Latino', 'slug' => 'latino', 'image' => 'http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Latinox200x200x4.webp', 'created_at' => NULL, 'updated_at' => NULL)
            );
            DB::table('brands')->insert($brands);
        }
    }
}
