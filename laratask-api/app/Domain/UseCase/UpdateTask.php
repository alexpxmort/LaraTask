<?php

namespace App\Domain\UseCase;
use App\Domain\Entity\Task;
use App\Domain\Exceptions\NotFoundException;
use App\Interfaces\DeleteTaskInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UpdateTaskInterface;

 class UpdateTask implements UpdateTaskInterface {
    private  $model;

    public function __construct( TaskRepositoryInterface $model)
    {

     $this->model = $model;
    }

    public  function execute(array $updateTaskDto,Task $updatedTask){

        try{
            $this->model->update($updateTaskDto['id'],$updatedTask);
        }catch(\Exception $e){
            throw $e;
        }
    }
}
