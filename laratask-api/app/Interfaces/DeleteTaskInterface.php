<?php

namespace App\Interfaces;

use App\Interfaces\TaskRepositoryInterface ;


interface DeleteTaskInterface{
    public function __construct( TaskRepositoryInterface $model);
    public function execute(array $deleteTaskDto);
}