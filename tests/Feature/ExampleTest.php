<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;
     use WithFaker;

     
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
  

    public function test_register(){
        $token = csrf_token();
        $response = $this->post('/cadastro',[
            'name' => $this->faker->name,
            'email' => 'dasdas@gmail.com',
            'password' =>  '123',
            'confirmPassword' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/login');

        $response = $this->post('login', [
            'email' => 'dasdas@gmail.com',
            'password' =>  '123',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/menu');
    }
}
