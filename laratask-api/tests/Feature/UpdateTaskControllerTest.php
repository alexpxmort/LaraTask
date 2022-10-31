<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\HttpResponseStatusHelper;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdateTaskController extends TestCase
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
    public function test_update_task_returns_an_unauthorized_error()
    {

        
        $response = $this->put('/api/tasks/'.$this->getLastId(),[
            'name' => 'test',
            'description' => 'test desc',
            'completed' => false
        ]);

    

        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('UNATHORIZED'));
    }

     /**
     * 
     *
     * @return void
     */
    public function test_update_task_returns_a_successfulll_response()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();


        $response = $this->put('/api/tasks/'.$this->getLastId(),[
            'name' => 'test',
            'description' => 'test desc updated',
            'completed' => false
        ],[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('NO_CONTENT'));
    }

    /**
     * 
     *
     * @return void
     */
    public function test_update_task_returns_a_bad_request_with_invalid_params()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();

        $response = $this->put('/api/tasks/'.$this->getLastId(),[
            'description' => 'test desc updated',
            'completed' => false
        ],[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

    
        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
        $response->assertSeeText('The name field is required.');
    }
}
