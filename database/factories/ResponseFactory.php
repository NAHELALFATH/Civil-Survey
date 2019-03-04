<?php

use Faker\Generator as Faker;

$factory->define(App\Response::class, function (Faker $faker) {
    return [
        "respondent_name" => $faker->name,
        "respondent_sex" => $faker->randomElement(["male", "female"]),
        "respondent_age" => rand(17, 70),
        "respondent_address" => $faker->streetAddress
    ];
});
