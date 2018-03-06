<?php

use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->text($maxNbChars = 300),
        'price' => $faker->numberBetween(10,50),
        'calories' => $faker->numberBetween(400,1000),
        'image' => $faker->image('/home/vagrant/Code/Diner/public/tmp', 800, 600, 'food'),
    ];
});
