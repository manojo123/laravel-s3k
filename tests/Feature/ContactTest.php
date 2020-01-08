<?php

namespace Tests\Feature;

use App\Contact;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    /** @test */
    public function guests_cannot_see_contact_index(){
        $this->get('contacts')
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_only_see_his_contacts(){
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        $this->be($user);

        $contact = factory(Contact::class)->create();

        $this->assertNotNull(auth()->check());
        $this->assertEquals($contact->user_id, auth()->id());

        $this->get('contacts')
            ->assertStatus(200)
            ->assertSee(Str::limit($contact->message, 20))
            ->assertSee($contact->subject);

    }

    /** @test */
    public function users_can_see_create_form(){
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        $this->be($user);

        $this->get('/contacts/create')
            ->assertStatus(200);
    }

    /** @test */
    public function users_can_create_contacts(){
        $user = factory(User::class)->create();
        $this->be($user);

        $this->post('contacts', [
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->text()
        ])->assertStatus(302)
        ->assertRedirect('contacts');

        $contact = Contact::find(1);
        $this->assertNotNull($contact);

        $this
            ->followingRedirects()
            ->post('contacts', [
                'subject' => '',
                'message' => $this->faker->text()
            ])
            ->assertSee('Campo Asunto Obligatorio');
    }


}
