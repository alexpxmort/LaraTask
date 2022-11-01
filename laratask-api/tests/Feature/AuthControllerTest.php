<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\HttpResponseStatusHelper;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{



     /**
     *
     *
     * @return void
     */
    public function test_log_out_returns_a_successfulll_response()
    {

        $dataResponseLogin = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ])->decodeResponseJson();



        $response = $this->post('/api/auth/logOut',[],[
            'Authorization' => 'Bearer '. $dataResponseLogin['token']
        ]);

        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('OK'));
    }

      /**
     *
     *
     * @return void
     */
    public function test_log_in_returns_a_successfulll_response()
    {

        $response = $this->post('/api/auth/login',[
            'email' => 'lexpdigi@gmail.com',
            'password' => '123456'
        ]);


        $response->assertStatus(HttpResponseStatusHelper::getStatusCode('OK'));
    }

}
