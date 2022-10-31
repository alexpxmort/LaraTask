<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface TaskRepositoryInterface{
    public function __construct( Model $model);
    public function create(array $createTaskDto);
    public function findById(int $id);
    public function findByUser(Model $user);
    public function delete(int $taskId);
}