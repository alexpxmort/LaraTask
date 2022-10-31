<?php

namespace App\Domain\UseCase;
use App\Domain\Entity\Task;
use App\Domain\Exceptions\NotFoundException;
use App\Interfaces\GetTaskInterface;
use App\Interfaces\TaskRepositoryInterface;

 class GetTask implements GetTaskInterface {
    private  $model;

    public function __construct( TaskRepositoryInterface $model)
    {

     $this->model = $model;   
    }

    public  function executeTasks(array $getTaskDto){

        $resultGetTasks = $this->model->findByUser($getTaskDto['user']);
        $resultTasks = [];


        foreach ($resultGetTasks as $resultGetTask) {
            $task = Task::create([
                'id'=>$resultGetTask->id,
                'name' =>$resultGetTask->name,
                'description' =>$resultGetTask->description,
                'completed' => boolval($resultGetTask->completed),
            ])->toArray();
            
            array_push($resultTasks,$task);

        }
        
        return $resultTasks;
         
    }

    public  function executeTask(array $getTaskDto){

        $resultGetTask = $this->model->findById($getTaskDto['id']);


        if(!$resultGetTask){
            throw new NotFoundException('NOT FOUND TASK');
        }

        return Task::create([
            'id'=>$resultGetTask->id,
            'name' =>$resultGetTask->name,
            'description' =>$resultGetTask->description,
            'completed' => boolval($resultGetTask->completed),
        ])->toArray();;
         
    }
}
