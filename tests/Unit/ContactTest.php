<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ContactTest extends TestCase
{
   // use RefreshDatabase;
    // admin controller

   public function test_welcome_admin()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('welcome1');
        $response->assertStatus(200);
    }
    public function test_display_admin()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('display');
        $response->assertStatus(200);
    }
    public function test_contact_admin()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('admincontact');
        $response->assertStatus(200);
    }
    public function test_register_admin(){
        $this->withoutExceptionHandling();

        $response = $this->get('regadmin');
        $response->assertStatus(200);
    }
   /* public function test_check_login()
    {
        $data = [
            'email' => 'vino@gmail.com',
            'password' => 'vinothini'
        ];
        $response= $this->post('log',$data);
        dd($response);
        $response->assertStatus(200);
    }
   /* public function test_contact_make()
    {
        $this->post('adcontact',['firstname'=>'giri','lastname'=>'v','email'=>'giri@gmail.com','phonenumber'=>'1234567','reason'=>'sleep mode']);
        $this->assertDatabaseHas('contacts',[]);
    }
//        $data=[
//            'firstname'=>'umasri',
//            'lastname'=>'v',
//            'email' => 'gagan.deep@ladybirdweb.com',
//            'phonenumber'=>'123456789',
//            'reason'=>'theme setting'
//        ];
//       $response= $this->post('contact',$data);
//       $response->assertStatus(302);
////dd($response);
//        $this->assertDatabaseHas('contacts',$data);
//    }*/

   public function test_delete_method_admin(){
        $admin=Contact::factory()->count(1)->make();
        $admin=Contact::first();
        if($admin){
            $admin->delete();
        }
        $this->assertTrue(true);
    }
}

