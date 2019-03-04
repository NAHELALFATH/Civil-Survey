<?php

use Faker\Generator as Faker;
use App\PublicTransportUserResponse;

$factory->define(App\PublicTransportUserResponse::class, function (Faker $faker) {
    return [
        "respondent_occupation" => $faker->sentence,
        "respondent_monthly_revenue" => rand(10, 200) * 100000,
    ];
});

$factory->state(App\PublicTransportUserResponse::class, PublicTransportUserResponse::STATE_USER, function ($faker) {
    return [
        "is_public_transport_user" => 1,
        "public_transport_usage_duration" => rand(1, 10),
        "public_transport_usage_purpose" => $faker->sentence,
        "desired_public_transport_type" => $faker->sentence,
    ];
});

$factory->state(App\PublicTransportUserResponse::class, PublicTransportUserResponse::STATE_NOT_USER, function ($faker) {
    return [
        "is_public_transport_user" => 1,
        "public_transport_disuse_reason" => $faker->sentence,
    ];
});
