<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface{
    public function __construct( Model $model);
    public function create(array $createUserDto);
    public function findByEmail(string $email);
}