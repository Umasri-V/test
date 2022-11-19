<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
   // client controller

    public function test_database(){
        $this->assertDatabaseHas('users',['name'=>'anushiya']);
    }
    public function test_status()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('homes');
        $response->assertStatus(200);
    }
    public function test_about()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('about');
        $response->assertStatus(200);
    }
    public function test_service()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('services');
        $response->assertStatus(200);
    }
    public function test_login()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('logins');
        $response->assertStatus(200);
    }
    public function test_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('registers');
        $response->assertStatus(200);
    }
    public function test_logout()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('logout');
        $response->assertStatus(200);
    }
   /* public function test_it_make()
    {
        $this->post('make',['name'=>'priya','email'=>'priya@gmail.com','phonenumber'=>'123456789','password'=>'priya123','address'=>'salem']);
        $this->assertDatabaseHas('users',[]);
    }*/


    public function test_delete_method(){
        $user=User::factory()->count(1)->make();
        $user=User::first();
        if($user){
            $user->delete();
        }
        $this->assertTrue(true);
    }

    // contact form

   /* public function test_contact_client()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('contact');
        $response->assertStatus(200);
    }*/
    public function test_it_contact_make_client()
    {
       /* $this->call('POST', url('contact'), ['firstname' => 'alfiya','lastname'=>'s',
            'email' => 'al@gmail.com', 'phonenumber' => '9876543210','reason'=>'theme']);*/
        Contact::create([
            'firstname' => 'ragulrao',
            'lastname'=>'r u',
            'email' => 'ragulu@gmail.com',
            'phonenumber' => 1223456677,
            'reason'=>'settings'
        ]);
        $this->assertDatabaseHas('contacts',[]);
    }
}
