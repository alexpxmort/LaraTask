<?php

namespace App\Domain\UseCase;

final class CreateTaskDto {

    public string $name;
    public string $description;
    public bool $completed;
    public int $userId;

    public function __construct(array $values){
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->completed = boolval($values['completed']);
        $this->userId = $values['userId'];
    }

    public function toArray():array{
        return [
            'name' =>$this->name,
            'description' =>$this->description,
            'completed' => boolval($this->completed),
            'userId' => $this->userId,
        ];
    }

    public static function create(array $values):self{
        return new self($values);
    }
}
