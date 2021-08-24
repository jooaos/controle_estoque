<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'sku' => $faker->unique()->numerify('########'),
        'quantity' => $faker->numberBetween(1, 100),
        'addBy' => $faker->randomElement(['api', 'sistema'])
    ];
});
