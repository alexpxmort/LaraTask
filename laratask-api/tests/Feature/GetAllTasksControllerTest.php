<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\HttpResponseStatusHelper;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GetAllTasksControllerTest extends TestCase
{

    

     /**
     * 
     *
     * @return void
     */
    public function test_get_all_tasks_returns_a_successfulll_response()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();


        $response = $this->get('/api/tasks/',[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('OK'));
    }

   
}
