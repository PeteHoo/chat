<?php

use Faker\Generator as Faker;

$factory->define(App\Model\News::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->jobTitle,
        'author'=>$faker->name,
        'content'=>$faker->text,
        'Pic'=>$faker->imageUrl(),
        'sub_title'=>$faker->jobTitle,
        'created_at'=>$faker->dateTime,
        'updated_at'=>$faker->dateTime,
    ];
});
