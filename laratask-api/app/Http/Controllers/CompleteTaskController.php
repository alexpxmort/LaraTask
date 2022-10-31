<?php
namespace  App\Http\Controllers;

use App\Domain\Entity\Task;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Request;
use App\Http\HttpResponseStatusHelper;
use App\Interfaces\CompleteTaskInterface;

class CompleteTaskController extends Controller{

    private $completeTask;
    public function __construct(CompleteTaskInterface $completeTask)
    {
        $this->completeTask = $completeTask;
    }


    public function handle($id){

        try{

            $output =  $this->completeTask->execute([
                'id' => $id,
            ]);

            return response()->json($output,HttpResponseStatusHelper::getStatusCode('NO_CONTENT'));

        }catch(\Exception $e){
            return response()->json([
                'msg'=>$e->getMessage(),
            ],HttpResponseStatusHelper::getStatusCode('NOT_FOUND'));
        }
    }

}
