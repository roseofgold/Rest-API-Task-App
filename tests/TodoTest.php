<?php
namespace App\Model;

use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{    
    /** @test */
    public function toDoCreatedWithMinimum()
    {
        $data = [
            'task' => "Task at Hand",
            'status' => 0,
        ];
        $listing = new ToDo($data);
        $this->assertIsObject($listing);
    }
}
