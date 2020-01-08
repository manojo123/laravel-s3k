<?php

namespace App;

use App\Video;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public function video(){
		return $this->belongsTo(Video::class);
	}
}
