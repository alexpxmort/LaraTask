<?php

namespace App\Domain\UseCase;
use App\Domain\Entity\Task;


final class CreateTask {

    public static function execute(CreateTaskDto $createTaskDto){
         $task = Task::create($createTaskDto->toArray());
        return $task->getName();
    }
}
