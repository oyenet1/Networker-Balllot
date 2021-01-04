<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Office;
use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {

    $total = Office::all();
    return [
        //
        'office_id' => random_int(1, count($total)),
        'name' => $faker->name,
        'details' => $faker->sentence(15),
        'image' => $faker->image(public_path('uploads'),640,480, null, false),

    ];
});
