<?php
namespace  App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Domain\UseCase\CreateTaskDto;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\CreateTaskInterface;


class CreateTaskController extends Controller{

    private $createTask;
    public function __construct(CreateTaskInterface $createTask)
    {
        $this->createTask = $createTask;
    }

    public function handle(){
        $user = Request::user();
        
        $inputData = Request::all();
        $validator =   $this->validateTask($inputData);
        $inputData['userId'] = $user->id;

        if(!$validator->fails()){
            try{
                $createTaskDto =  CreateTaskDto::create($inputData);
                $output =  $this->createTask->execute($createTaskDto->toArray());


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

    public function validateTask($data){
        $validate = Validator::make($data,[
             'name'=>'required|string',
             'description'=>'required|string',
             'completed'=>'required|boolean'
         ]);

         return $validate;
     }
}
