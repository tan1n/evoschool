<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'fname'=>$faker->name,
        'mname'=>$faker->name,
        'roll'=>$faker->randomDigit,
        'class_roll'=>$faker->randomDigit,
        'reg'=>$faker->randomDigit,
        'address'=>$faker->address,
        'class_id'=>rand(1,3),
        'group_id'=>rand(1,3),
        'section_id'=>rand(1,3),
        'phone'=>$faker->phoneNumber,
        'admission_date'=>date('Y-m-d')
    ];
});
