<?php

namespace App\Interfaces;



interface CreateUserInterface{
    public function __construct( UserRepositoryInterface $model);
    public function execute(array $createUserDto);
}