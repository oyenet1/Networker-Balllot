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
        'details' => $faker->paragraph(4),
        'image' => $faker->image(public_path('uploads'),300,300, null, false),
    ];
});
