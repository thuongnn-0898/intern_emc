<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => 100,
        'image' => 'default.png',
        'shortText' => $faker->name,
        'longText' => $faker->text,
        'quantity' => 50,
        'category_id' => \App\Models\Category::first()->id,
   ];
});
