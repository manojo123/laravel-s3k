<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
    	'user_id' => function(){
    		return auth()->id() ?: factory(User::class)->create()->id;
    	},
    	'subject' => $faker->sentence(),
    	'message' => $faker->text()
    ];
});
