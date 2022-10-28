<?php
namespace  App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Domain\UseCase\CreateTask;
use App\Domain\UseCase\CreateTaskDto;

class TaskController extends Controller{

    public function create(){
        $inputData = Request::all();
        $validator =   $this->validateTask($inputData);

        if(!$validator->fails()){
            try{
                $createTaskDto =  CreateTaskDto::create($inputData);
                $output =  CreateTask::execute($createTaskDto);

                return response()->json([
                    'ok'=>$output
                ]);
            }catch(\Exception $e){
                return response()->json([
                    'msg'=>$e->getMessage(),
                ],400);
              }
        }else{
            return response()->json($validator->errors(),400);
        }
    }

    public function validateTask($data){
        $validate = Validator::make($data,[
             'name'=>'required|string',
             'description'=>'required|string',
             'completed'=>'required|boolean',
         ]);

         return $validate;
     }
}
