<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\HttpResponseStatusHelper;
use App\Models\TaskModel;
use Mockery;
use Tests\TestCase;

class CreateTaskController extends TestCase
{
    /**
     * 
     *
     * @return void
     */
    public function test_create_task_returns_an_unauthorized_error()
    {

        
        $response = $this->post('/api/tasks/create',[
            'name' => 'test',
            'description' => 'test desc',
            'completed' => false
        ]);

    

        $response->assertStatus(401);
    }

     /**
     * 
     *
     * @return void
     */
    public function test_create_task_returns_a_successfulll_response()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();


        $response = $this->post('/api/tasks/create',[
            'name' => 'test',
            'description' => 'test desc',
            'completed' => false
        ],[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

        $response->assertStatus(200);
    }

    /**
     * 
     *
     * @return void
     */
    public function test_create_task_returns_a_bad_request_with_invalid_params()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();

        $response = $this->post('/api/tasks/create',[
            'description' => 'test desc',
            'completed' => false
        ],[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

    
        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
        $response->assertSeeText('The name field is required.');
    }
}
