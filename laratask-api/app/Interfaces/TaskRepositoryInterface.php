<?php

namespace App\Interfaces;

use App\Domain\Entity\Task;
use Illuminate\Database\Eloquent\Model;

interface TaskRepositoryInterface{
    public function __construct( Model $model);
    public function create(array $createTaskDto);
    public function findById(int $id);
    public function findByUser(Model $user);
    public function delete(int $taskId);
    public function update(int $taskId,Task $updatedTask);
    public function completeTask(int $taskId);
}
