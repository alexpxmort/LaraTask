<?php

namespace App\Domain\UseCase;

final class LoginDto {

    public string $email;
    public string $password;

    public function __construct(array $values){
        $this->email = $values['email'];
        $this->password = $values['password'];
    }

    public function toArray():array{
        return [
            'email' =>$this->email,
            'password' => $this->password
        ];
    }

    public static function create(array $values):self{
        return new self($values);
    }
}
