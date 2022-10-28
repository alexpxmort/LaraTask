<?php

namespace App\Infra\Repositories;

class TaskRepository {
    private $dbManager;
    public function __construnct($dbManager){
        $this->dbManager = $dbManager;
    }

    public function create(Task $task){
        $this->dbManager->create($task);
    }
}
