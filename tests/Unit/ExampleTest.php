<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\LoginController;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /** @test */

    public function login()
    {
        $data = [
            'email' => 'test@example.com',
            'password' => 'example2022'
        ];

        $this->post('/login',[
            'email' => $data['email'],
            'password' =>$data['password'],
        ]);

        $this->assertAuthenticated();
    }
}
