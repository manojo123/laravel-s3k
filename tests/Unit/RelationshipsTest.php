<?php

namespace Tests\Unit;

use App\Comment;
use App\Tag;
use App\User;
use App\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class RelationshipsTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function videos_has_many_comments(){
		$video = factory(Video::class)
			->create();

		$comment = factory(Comment::class)
			->create(['video_id' => $video->id]);


		$this->assertEquals($video->comments[0]->id, $comment->video_id);
	}

	/** @test */
	public function comment_belongs_to_a_video(){
		$video = factory(Video::class)
			->create();

		$comment = factory(Comment::class)
			->create(['video_id' => $video->id]);


		$this->assertEquals($comment->video_id, $video->id);
	}

	/** @test */
	public function video_belongs_to_many_tags(){
		$video = factory(Video::class)->create();
		$tag = factory(Tag::class)->create();

		$video->tags()->attach($tag);

		$this->assertEquals($video->tags[0]->id, $tag->id);
	}
	/** @test */
	public function tags_belongs_to_many_videos(){
		$video = factory(Video::class)->create();
		$tag = factory(Tag::class)->create();

		$tag->videos()->attach($video);

		$this->assertEquals($tag->videos[0]->id, $video->id);
	}

	/** @test */
	public function users_has_many_tags(){
		$user = factory(User::class)->create();
		$tag = factory(Tag::class)->create(['user_id' => $user->id]);

		$this->assertEquals($user->tags[0]->id, $tag->id);
		
	}
}
