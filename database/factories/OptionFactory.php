<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'options' => json_encode(
            [
                'hot' => 'on',
                'new' => 'on',
                'sale' => 'on',
            ]
        )
    ];
});
