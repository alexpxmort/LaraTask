<?php
namespace  App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\GetTaskInterface;

class GetTasksController extends Controller{

    private $getTask;
    public function __construct(GetTaskInterface $getTask)
    {
        $this->getTask = $getTask;
    }

    public function handle(){
        $user = Request::user();
        
        try{
            $output =  $this->getTask->executeTasks([
                'user' => $user
            ]);


            return response()->json($output);
        }catch(\Exception $e){
            return response()->json([
                'msg'=>$e->getMessage(),
            ],HttpResponseStatusHelper::getStatusCode('BAD_REQUEST'));
         }
    }
}
