<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Medicine::class, function (Faker $faker) {

    $name = $faker->text(50);

    return [
        'name' => $name,
        'slug' => str_slug($name, '-'),
        'published_at' => now(),
        'is_published' => 1,
        'short_text' => $faker->text(100),
        'long_text' => $faker->text(1000),
        'creator_id' => 1,
        'category_id' => $faker->randomElement([1, 2, 3, 4]),
        'company_id' => 1,
        'image_url' => 'https://images-na.ssl-images-amazon.com/images/I/711%2BtNeHfhL._SL1500_.jpg',
        'price' => $faker->numberBetween(10, 1000)
    ];
});
