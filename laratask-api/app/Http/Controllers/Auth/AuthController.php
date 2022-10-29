<?php
namespace  App\Http\Controllers\Auth;

use App\Domain\UseCase\LoginDto;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\LoginInterface;
use Carbon\Carbon;


use JWTAuth;


class AuthController extends Controller{

    public function handle(){
        $inputData = Request::all();
        $validator =   $this->validateLogin($inputData);

        if(!$validator->fails()){
            try{

                $loginDto =  LoginDto::create($inputData);

                if($token = JWTAuth::attempt(
                   $loginDto->toArray(),
                    ['exp' => Carbon::now()->addMinutes(5)->timestamp]
                )){
                    return response()->json(['token' => $token,],HttpResponseStatusHelper::getStatusCode('OK'));
                }else{
                    return response()->json(['msg'=>'Erro ao logar'],HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
                }

                return response()->json([]);
            }catch(\Exception $e){

                dd($e);
                return response()->json([
                    'msg'=>$e->getMessage(),
                ],HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
              }
        }else{
            return response()->json($validator->errors(),HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
        }
    }

    public function validateLogin($data){
        $validate = Validator::make($data,[
             'email'=>'required|string',
             'password'=>'required|string'
         ]);

         return $validate;
     }
}
