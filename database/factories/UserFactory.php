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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    static $password;
    $data = Ramsey\Uuid\Uuid::uuid1(time());
    $str = $data->getHex();    //32位字符串方法
    return [
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'is_admin' => false,
            'activated' => true,
            'password' => $password ?: $password = bcrypt('secret'),
            'remember_token' => str_random(10),
            'created_at' => $date_time,
            'updated_at' => $date_time,
            'uuid' => $str
    ];
});
