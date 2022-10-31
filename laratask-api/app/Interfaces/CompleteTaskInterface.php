<?php

namespace App\Interfaces;

use App\Domain\Entity\Task;
use App\Interfaces\TaskRepositoryInterface ;


interface CompleteTaskInterface{
    public function __construct( TaskRepositoryInterface $model);
    public function execute(array $completeTaskDto);
}
