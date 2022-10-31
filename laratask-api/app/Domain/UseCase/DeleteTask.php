<?php

namespace App\Domain\UseCase;
use App\Domain\Entity\Task;
use App\Domain\Exceptions\NotFoundException;
use App\Interfaces\DeleteTaskInterface;
use App\Interfaces\GetTaskInterface;
use App\Interfaces\TaskRepositoryInterface;

 class DeleteTask implements DeleteTaskInterface {
    private  $model;

    public function __construct( TaskRepositoryInterface $model)
    {

     $this->model = $model;   
    }

    public  function execute(array $deleteTaskDto){

        try{
            $this->model->delete($deleteTaskDto['id']);
        }catch(\Exception $e){
            throw $e;
        }
    }
}
