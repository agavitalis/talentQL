<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\Request;



class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Create a task
     * @param array $attributes
     */
    public function createATask(array $taskRequest)
    {
        if(!isset($taskRequest["end_time"])){

            $taskRequest["is_task_all_day"] = true;
        }

        $task = Task::create($taskRequest);

        if ($task) {
            return $task;
        }

        throw new \Exception("Something went wrong while creating this task", 99);
    }
    
    /**
     * Get all Tasks
     */
    public function getAllTasks()
    {
        return Task::all();
    }

  
}
