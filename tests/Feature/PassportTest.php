<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PassportTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    /** @test */
    public function users_can_see_themselves(){
        $user = factory(User::class)->create();

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $response = $this
            ->get('/api/user')
            ->assertSee($user->name)
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_send_name_and_see_name(){
        $user = factory(User::class)->create();

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $name = $this->faker->word();
        $this->post('api/username', [
            'nombre' => $name
        ])
            ->assertStatus(200)
            ->assertSee($name);
    }
}
