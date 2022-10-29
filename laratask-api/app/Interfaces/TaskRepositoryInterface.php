<?php

namespace App\Interfaces;

use App\Models\TaskModel;
use Illuminate\Database\Eloquent\Model;

interface TaskRepositoryInterface{
    public function __construct( Model $model);
    public function create(array $createTaskDto);
}