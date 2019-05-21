<?php
namespace App\Model;

use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    /** @test to retreive all tasks*/
    public function testRetrieveAllToDos()
    {
        $data = [
            'id' => 1,
            'task' => 'Test Title',
            'status' => '1'
        ];
        $response = new Todo();
        $this->assertEquals(200, $response->getStatusCode());
    }
}
