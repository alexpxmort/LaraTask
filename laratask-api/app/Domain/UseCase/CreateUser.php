<?php

namespace App\Domain\UseCase;

use App\Domain\Entity\UserEntity;
use App\Domain\Exceptions\UserAlreadyExistsException;
use App\Interfaces\CreateUserInterface;
use App\Interfaces\UserRepositoryInterface;

 class CreateUser implements CreateUserInterface {
    private  $model;

    public function __construct( UserRepositoryInterface $model)
    {

     $this->model = $model;   
    }

    public  function execute(array $createUserDto){
        $user = $this->model->findByEmail($createUserDto['email']);
        
        if($user){
            throw new UserAlreadyExistsException('User already exists!');
        }

         
        $resultCreateUser = $this->model->create($createUserDto);

        
        return UserEntity::create([
            'id'=>$resultCreateUser->id,
            'name' =>$resultCreateUser->name,
            'email' =>$resultCreateUser->email,
            'password' => $resultCreateUser->password,
        ])->toArray();
    }
}
