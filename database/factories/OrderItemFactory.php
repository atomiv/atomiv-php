<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderItem;
use App\Product;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    $product =  Product::all()->random();
    return [
        'product_id' => $product->id,
        'product_code' => $product->code,
        'product_price' => $product->unit_price,
        'quantity' => $faker->numberBetween(1,10)
    ];
});
