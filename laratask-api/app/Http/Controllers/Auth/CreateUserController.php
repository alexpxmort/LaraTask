<?php
namespace  App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Domain\UseCase\CreateUserDto;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\CreateUserInterface;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller{

    private $createUser;
    public function __construct(CreateUserInterface $createUser)
    {
        $this->createUser = $createUser;
    }

    public function handle(){
        $inputData = Request::all();
        $validator =   $this->validateUser($inputData);

        if(!$validator->fails()){
            try{
                $createUserDto =  CreateUserDto::create($inputData);
                $createUserDto->password = Hash::make($createUserDto->password);

                $output =  $this->createUser->execute($createUserDto->toArray());


                return response()->json($output);
            }catch(\Exception $e){
                return response()->json([
                    'msg'=>$e->getMessage(),
                ],HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
              }
        }else{
            return response()->json($validator->errors(),HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
        }
    }

    public function validateUser($data){
        $validate = Validator::make($data,[
             'name'=>'required|string',
             'email'=>'required|string',
             'password'=>'required|string'
         ]);

         return $validate;
     }
}
