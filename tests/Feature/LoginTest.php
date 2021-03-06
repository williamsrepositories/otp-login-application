<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    /**
     *
     *
     *
     * @test
     */

    public  function  after_login_user_can_not_access_home_page_until_verified()
    {
        /*$user =  factory(User::class)->create();
        $this->actingAs($user);
         $this->get('/home')->assertRedirect('/');
        */

        $this->logInUser();
        $this->get('/home')->assertRedirect('/verifyOTP');
    }


    /**
     *
     *
     *
     * @test
     */

    public  function  after_login_user_can_access_home_page_if_verified()
    {
        //$user =  factory(User::class)->create(['isVerified'=>1]);
       // $user =  factory(User::class)->create();

        $this->logInUser(['isVerified'=>1]);
        $this->get('/home')->assertStatus(200);
    }
}
