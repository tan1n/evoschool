<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'phone'=>$faker->phoneNumber,
        'address'=>$faker->address,
        'designation_id'=>rand(1,2)             
    ];
});
