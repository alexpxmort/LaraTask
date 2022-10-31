<?php

namespace App\Domain\UseCase;
use App\Domain\Entity\Task;
use App\Domain\Exceptions\NotFoundException;
use App\Interfaces\DeleteTaskInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\CompleteTaskInterface;

 class CompleteTask implements CompleteTaskInterface {
    private  $model;

    public function __construct( TaskRepositoryInterface $model)
    {

     $this->model = $model;
    }

    public  function execute(array $completeTaskDto){

        try{
            $this->model->completeTask($completeTaskDto['id']);
        }catch(\Exception $e){
            throw $e;
        }
    }
}
