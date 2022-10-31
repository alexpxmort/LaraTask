<?php

namespace App\Domain\Entity;

 final class Task{
    private ?int $id = null;
    private string $name;
    private string $description;
    private bool $completed = false;

    public function __construct(array $values){
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->completed = $values['completed'];

        if(array_key_exists('id',$values)){
            $this->id =  $values['id'];
        }

    }

    public function toArray():array{
        $arrTask =  [
            'name' =>$this->name,
            'description' =>$this->description,
            'completed' => boolval($this->completed),
        ];

        if($this->id){
            $arrTask['id'] = $this->id;
        }

        return $arrTask;
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
