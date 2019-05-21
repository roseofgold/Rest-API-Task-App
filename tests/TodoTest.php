<?php
declare(strict_types=1);

namespace App\Model;

use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    protected $database;

    public function setUp() : void
    {
    }

    public function testAllTasksAreRetrieved()
    {
        $task = new ToDo();
        $task->getAllTasks();

        $this->assertEquals($task->getAllTasks(),'');
    }
}
