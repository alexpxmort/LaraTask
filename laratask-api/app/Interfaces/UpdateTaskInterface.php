<?php

namespace App\Interfaces;

use App\Domain\Entity\Task;
use App\Interfaces\TaskRepositoryInterface ;


interface UpdateTaskInterface{
    public function __construct( TaskRepositoryInterface $model);
    public function execute(array $deleteTaskDto,Task $updatedTask);
}