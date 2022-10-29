<?php
namespace App\Infra\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TaskRepositoryEloquent  implements TaskRepositoryInterface {
    protected $model;
    public function __construct( Model $model){
        $this->model = $model;
    }

    public function create( array $createTaskDto){
       return  $this->model->create($createTaskDto);
    }
}
