<?php

namespace Tests\Unit;

use App\Domain\Entity\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_should_instanciate_class_task()
    {
        $task = new Task([
            'name'=> 'test',
            'description' => 'test desc',
            'completed' => false
        ]);

        $this->assertInstanceOf(Task::class,$task);
        $this->assertTrue($task->getName() === 'test');
        $this->assertTrue($task->getDescription() === 'test desc');
        $this->assertTrue($task->isCompleted() === false);
    }
}
