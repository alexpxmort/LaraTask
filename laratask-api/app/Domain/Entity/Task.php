<?php

namespace App\Domain\Entity;

 final class Task{
    private int $id;
    private string $name;
    private string $description;
    private bool $completed = false;

    public function __construct(array $values){
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->completed = $values['completed'];
    }

    public function getName():string{
        return $this->name;
    }

    public function getDescription():string{
        return $this->description;
    }

    public static function create(array $values):self{
        return new self($values);
    }

    public function complete():void{
        $this->completed = true;
    }

    public function  isCompleted():bool{
        return $this->completed;
    }

}
