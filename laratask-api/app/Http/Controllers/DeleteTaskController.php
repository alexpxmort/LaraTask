<?php
namespace  App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\DeleteTaskInterface;

class DeleteTaskController extends Controller{

    private $deleteTask;
    public function __construct(DeleteTaskInterface $deleteTask)
    {
        $this->deleteTask = $deleteTask;
    }

    public function handle($id){
        
        try{
            $output =  $this->deleteTask->execute([
                'id' => $id
            ]);
            

            return response()->json($output,HttpResponseStatusHelper::getStatusCode('NO_CONTENT'));
        }catch(\Exception $e){
            return response()->json([
                'msg'=>$e->getMessage(),
            ],HttpResponseStatusHelper::getStatusCode('NOT_FOUND'));
         }
    }
}
