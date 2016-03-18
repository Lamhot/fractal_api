<?php

use App\Models\Penulis;

$factory->define(Penulis::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->id,
        'name' => $faker->name,
        'email' => $faker->email,
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});