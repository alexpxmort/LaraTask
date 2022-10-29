<?php
namespace App\Infra\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepositoyEloquent  implements UserRepositoryInterface {
    protected $model;
    public function __construct( Model $model){
        $this->model = $model;
    }

    public function create( array $createUserDto){
       return  $this->model->create($createUserDto);
    }


    public function findByEmail(string $email)
    {   
        return  $this->model->where('email',$email)->first();
    }
}
