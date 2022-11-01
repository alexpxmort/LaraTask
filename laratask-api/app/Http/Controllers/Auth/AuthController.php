<?php
namespace  App\Http\Controllers\Auth;

use App\Domain\UseCase\LoginDto;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\LoginInterface;
use Carbon\Carbon;

use Auth;


class AuthController extends Controller{

    private $minutesExpiresToken = 60;

    public function handle(){
        $inputData = Request::all();
        $validator =   $this->validateLogin($inputData);

        if(!$validator->fails()){
            try{

                $loginDto =  LoginDto::create($inputData);

                if($token = Auth::attempt(
                   $loginDto->toArray(),
                    ['exp' => Carbon::now()->addMinutes($this->minutesExpiresToken)->timestamp]
                )){
                    return response()->json(['token' => $token,],HttpResponseStatusHelper::getStatusCode('OK'));
                }else{
                    return response()->json(['msg'=>'Erro ao logar'],HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
                }

                return response()->json([]);
            }catch(\Exception $e){

                return response()->json([
                    'msg'=>$e->getMessage(),
                ],HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
              }
        }else{
            return response()->json($validator->errors(),HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
        }
    }

    public function logOut(){
       try{
            Auth::logout();
            return response()->json(['msg' => true],HttpResponseStatusHelper::getStatusCode('OK'));
       }catch(\Exception $e){
        return response()->json($e->getMessage(),HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
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
