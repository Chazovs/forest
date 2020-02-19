<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\genome;
use Faker\Generator as Faker;

$factory->define(genome::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'species' => $faker->word,
        'division_type_id' => $faker->randomDigitNotNull,
        'life_expectancy' => $faker->randomDigitNotNull,
        'beginning_fruiting_from' => $faker->randomDigitNotNull,
        'beginning_fruiting_to' => $faker->randomDigitNotNull,
        'sun_influence' => $faker->randomDigitNotNull,
        'first_shoots' => $faker->randomDigitNotNull,
        'end_growth' => $faker->randomDigitNotNull,
        'life_span_cambium' => $faker->randomDigitNotNull,
        'life_span_zabolon' => $faker->randomDigitNotNull
    ];
});
