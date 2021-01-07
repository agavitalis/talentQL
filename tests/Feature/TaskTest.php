<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;

class TaskTest extends TestCase
{
   use RefreshDatabase;

    /**
     * Create task  with time limit.
     *
     * @return 200 response
     */
    public function testForCreatingTaskWithTimeLimit()
    {

        $fields = [

            'task' => "Finish talentQR Project",
            'description' => 'Building a Todo Application',
            'start_time' => '2021-01-05 02:30:43',
            'end_time'  => '2021-01-07 02:30:43',
        ];

        $this->json("POST", "/api/task/create_task", $fields, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Task Successfully Created!",
                "code"      => "00"
            ]);
    }

    /**
     * Create task without time limit.
     *
     * @return 200 response
     */
    public function testForCreatingTaskWithoutTimeLimit()
    {

        $fields = [
            'task' => "Finish talentQR Project",
            'description' => 'Building a Todo Application',
            'start_time' => '2021-01-05 02:30:43',
        ];

        $this->json("POST", "/api/task/create_task", $fields, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Task Successfully Created!",
                "code"      => "00"
            ]);
    }

    /**
     * Fetch all task.
     *
     * @return 200 response
     */
    public function testForFetchingTasks()
    {
         // Create multiple tasks
         Task::factory()->count(10)->create();

        $this->json('GET', '/api/task/get_all_tasks', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Fetched all Tasks!",
                "code"      => "00"
            ]);
    }

    /**
     * Create Update Task.
     */
    public function testForTaskUpdate()
    {
        // Create a task
        $task = Task::factory()->create();
        $payload = [
            'comments' => "I have finisheed this project",
        ];
        $this->json('PUT', '/api/task/update_task/'.$task->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Task Updated!",
                "code"      => "00"
            ]);
    }

    /**
     * Delete a task
     */
    public function testForTaskDelete()
    {

        // Create a task
        $task = Task::factory()->create();
       
        $this->json('DELETE', '/api/task/delete_a_task/'.$task->id, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Task Deleted!",
                "code"      => "00"
            ]);
    }
}
