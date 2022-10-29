<?php

namespace App\Domain\Entity;

 final class UserEntity{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(array $values){
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->password = $values['password'];

        if(array_key_exists('id',$values)){
            $this->id = $values['id'];
        }
    }

    public function toArray():array{
        return [
            'id'=>$this->id,
            'name' =>$this->name,
            'email' =>$this->email,
            'password' => $this->password,
        ];
    }


    public function getName():string{
        return $this->name;
    }

    public function getEmail():string{
        return $this->email;
    }

    
    public function getPassword():string{
        return $this->password;
    }

    public static function create(array $values):self{
        return new self($values);
    }




}
