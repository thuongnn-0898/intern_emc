<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Profile::class, function (Faker $faker) {
    return [
        'country' => 'Da Nang',
        'phone' => '0905827922',
        'avatar' => '',
        'address' => 'To 16 Da Nang Viet Nam',
        'state' => 'Son Tra'
    ];
});
