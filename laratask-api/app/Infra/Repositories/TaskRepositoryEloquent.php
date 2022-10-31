<?php
namespace App\Infra\Repositories;

use App\Domain\Exceptions\NotFoundException;
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

    public function findById(int $id){
        return $this->model->where('id',$id)->first();
    }

    public function findByUser(Model $user){
        return $user->tasks()->get();
    }


    public function delete(int $taskId){
        $task = $this->findById($taskId);

        if(!$task){
            throw new NotFoundException('NOT FOUND TASK');
        }

        return $task->delete();
    }
}
