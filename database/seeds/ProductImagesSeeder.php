<?php

use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ProductImages', 1)->create();
    }
}