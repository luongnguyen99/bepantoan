<?php

use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                OptionsSeeder::class,
                Post_categorySeeder::class,
                PostSeeder::class,
                ShowroomSeeder::class,
                BrandsTableSeed::class,
                PropertiesTableSeed::class,
                Property_valuesTableSeed::class,
                CategoriesTableSeed::class,
                Categories_PropertiesTableSeed::class,
                ProductTableSeed::class,
                GalleriesTableSeed::class,
                Products_property_valuesTableSeed::class,
                Status_orderTableSeed::class,
            ]
        );
       
    }
}
