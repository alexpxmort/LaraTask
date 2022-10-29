<?php

namespace Tests\Feature;


use App\Http\HttpResponseStatusHelper;

use Tests\TestCase;

class CreateUserControllerTest extends TestCase
{
   
     /**
     * 
     *
     * @return void
     */
    public function test_create_user_returns_a_successfulll_response()
    {

    
        $response = $this->post('/api/users/create',[
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => '123456'
        ]);

        $response->assertStatus(200);
    }

    /**
     * 
     *
     * @return void
     */
    public function test_create_user_returns_a_bad_request_with_invalid_params()
    {

   
        $response = $this->post('/api/users/create',[
            'name' => 'alex'
        ]);

    
        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
        $response->assertSeeText('The email field is required.');
        $response->assertSeeText('The password field is required.');
    }
}
