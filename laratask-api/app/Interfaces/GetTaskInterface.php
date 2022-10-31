<?php

namespace App\Interfaces;

use App\Interfaces\TaskRepositoryInterface ;


interface GetTaskInterface{
    public function __construct( TaskRepositoryInterface $model);
    public function executeTask(array $getTaskDto);
    public function executeTasks(array $getTaskDto);
}