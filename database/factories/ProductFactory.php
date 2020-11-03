<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'code' => $faker->numerify('######'),
        'description' => $faker->text('100'),
        'unit_price' => $faker->randomFloat('2',1,12)
    ];
});
