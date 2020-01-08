<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Video;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
    	'user_id' => function(){
    		return auth()->id() ?: factory(User::class)->create()->id;
    	},
    	'video_id' => function(){
    		return factory(Video::class)->create()->id;
    	},
    	'comment' => $faker->text()
    ];
});
