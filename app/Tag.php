<?php

namespace App;

use App\Video;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function videos(){
		return $this->belongsToMany(Video::class)->withTimestamps();
	}
}
