<?php

use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->text($maxNbChars = 1000),
        'price' => $faker->numberBetween(10,1000),
        'calories' => $faker->numberBetween(500,1000),
        'image' => $faker->image('/home/vagrant/Code/Diner/public/tmp', 800, 600, 'food'),
    ];
});
