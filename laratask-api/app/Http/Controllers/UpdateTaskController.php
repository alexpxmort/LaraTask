<?php
namespace  App\Http\Controllers;

use App\Domain\Entity\Task;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Request;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\UpdateTaskInterface;

class UpdateTaskController extends Controller{

    private $updateTask;
    public function __construct(UpdateTaskInterface $updateTask)
    {
        $this->updateTask = $updateTask;
    }


    public function handle($id){

            $inputData = Request::all();
            $validator =   $this->validateTask($inputData);


            if(!$validator->fails()){
                try{
                    $updatedTask = Task::create([
                    'name' =>$inputData['name'],
                    'description' =>$inputData['description'],
                    'completed' => boolval($inputData['completed']),
                    ]);

                    $output =  $this->updateTask->execute([
                        'id' => $id
                    ],$updatedTask);

                    return response()->json($output,HttpResponseStatusHelper::getStatusCode('NO_CONTENT'));

                }catch(\Exception $e){
                    return response()->json([
                        'msg'=>$e->getMessage(),
                    ],HttpResponseStatusHelper::getStatusCode('NOT_FOUND'));
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
