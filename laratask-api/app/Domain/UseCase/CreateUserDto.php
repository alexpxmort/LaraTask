<?php

namespace App\Domain\UseCase;

final class CreateUserDto {

    public string $name;
    public string $email;
    public string $password;

    public function __construct(array $values){
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->password = $values['password'];
    }

    public function toArray():array{
        return [
            'name' =>$this->name,
            'email' =>$this->email,
            'password' => $this->password
        ];
    }

    public static function create(array $values):self{
        return new self($values);
    }
}
