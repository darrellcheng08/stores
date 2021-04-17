<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImages;
use Faker\Generator as Faker;

$factory->define(ProductImages::class, function (Faker $faker) {
    return [
        'image_url' => $faker->image('public/storage/product-images', 640, 480, null, false),
        'product_id' => factory('App\Product')->create()->id
    ];
});