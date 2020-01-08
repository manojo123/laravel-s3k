<?php

namespace App;

use App\Comment;
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	public function comments(){
		return $this->hasMany(Comment::class);
	}

	public function tags(){
		return $this->belongsToMany(Tag::class)->withTimestamps();
	}
}