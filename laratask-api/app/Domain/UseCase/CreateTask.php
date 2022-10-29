<?php

namespace App\Domain\UseCase;
use App\Domain\Entity\Task;
use App\Interfaces\CreateTaskInterface;
use App\Interfaces\TaskRepositoryInterface;

 class CreateTask implements CreateTaskInterface {
    private  $model;

    public function __construct( TaskRepositoryInterface $model)
    {

     $this->model = $model;   
    }

    public  function execute(array $createTaskDto){
        $resultCreateTask = $this->model->create($createTaskDto);
        $resultCreateTask->user()->associate($createTaskDto['userId']);
        $resultCreateTask->save();
        
        return Task::create([
            'id'=>$resultCreateTask->id,
            'name' =>$resultCreateTask->name,
            'description' =>$resultCreateTask->description,
            'completed' => boolval($resultCreateTask->completed),
        ])->toArray();
    }
}
