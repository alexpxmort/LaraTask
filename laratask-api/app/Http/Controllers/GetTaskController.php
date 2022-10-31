<?php
namespace  App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\GetTaskInterface;

class GetTaskController extends Controller{

    private $getTask;
    public function __construct(GetTaskInterface $getTask)
    {
        $this->getTask = $getTask;
    }

    public function handle($id){
        $user = Request::user();
        
        try{
            $output =  $this->getTask->executeTask([
                'id' => $id
            ]);
            

            return response()->json($output);
        }catch(\Exception $e){
            return response()->json([
                'msg'=>$e->getMessage(),
            ],HttpResponseStatusHelper::getStatusCode('NOT_FOUND'));
         }
    }
}
