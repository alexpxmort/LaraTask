<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\HttpResponseStatusHelper;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GetTaskControllerTest extends TestCase
{

    public function getLastId(){
        $lastId =  DB::select('SELECT MAX(id) as id FROM tasks');
 
        return $lastId[0]->id;
     }
    

     /**
     * 
     *
     * @return void
     */
    public function test_get_task_returns_a_successfulll_response()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();


        $response = $this->get('/api/tasks/'.$this->getLastId(),[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('OK'));
    }

     /**
     * 
     *
     * @return void
     */
    public function test_get_task_returns_not_found_response()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();


        $response = $this->get('/api/tasks/0',[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('NOT_FOUND'));
    }

   
}
