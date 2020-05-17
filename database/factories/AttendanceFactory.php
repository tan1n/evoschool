<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        //
        'std_id'=>factory(Student::class),
        'timestamp'=>date('Y-m-d h:m:s'),
        'status'=>rand(1,0),
        'punch'=>rand(1,0)
    ];
});
