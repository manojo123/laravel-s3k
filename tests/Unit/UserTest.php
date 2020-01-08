<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function it_checks_if_is_super_user(){
		$user = factory(User::class)->create();

		$this->assertEquals($user->id, 1);
		$this->assertTrue($user->isAdmin());
	}
}
