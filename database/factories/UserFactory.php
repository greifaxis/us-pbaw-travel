<?php

use App\User;
use App\Role;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    $company = $faker->boolean($chanceOfGettingTrue = 75) ? $faker->company : null;
    return [
        'name' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'company' => $company,
        'nipnum' => ($company <> null) ? $faker->isbn10 : null,
        'phone' => $faker->numerify('+###########'),
        'address' => $faker->address,
        'remember_token' => Str::random(10),
//        'role_id' => Role::all()->random()->id,
    ];
});
