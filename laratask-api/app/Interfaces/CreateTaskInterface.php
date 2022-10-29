<?php

namespace App\Interfaces;

use App\Interfaces\TaskRepositoryInterface ;


interface CreateTaskInterface{
    public function __construct( TaskRepositoryInterface $model);
    public function execute(array $createTaskDto);
}