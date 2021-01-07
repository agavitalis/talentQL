<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskRepositoryInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Create a task
     *
     * @return Task
     */
    public function crateATask(TaskRequest $task)
    {

        $taskRequest = $task->validated();
        try {
            $tasks = $this->taskService->createATask($taskRequest);
            $code = "00";
            $message = "Task Successfully Created!";
            $status = 200;
        } catch (\Exception $e) {
            $code = "99";
            $tasks = [];
            $message = $e->getMessage();
            $status = 422;
        }

        return response()->json([
            "message" => $message,
            "data" => $tasks,
            "code" => $code
        ], $status);
    }

    /**
     * Get List of tasks
     *
     * @return Array Tasks
     */
    public function getAllTasks()
    {
        try {
            $tasks = $this->taskService->getAllTasks();
            $code = "00";
            $message = "Fetched all Tasks!";
        } catch (\Exception $e) {
            $code = "99";
            $tasks = [];
            $message = $e->getMessage();
        }

        return response()->json([
            "message"   => $message,
            "data"      => $tasks,
            "code"      => $code,
            "status" => 200
        ]);
    }

    /**
     * Get a task
     *
     * @return Task
     */
    public function getATask(Task $task)
    {
        return response()->json([
            "message"   => "Fetched Task!",
            'data'      => $task,
            "code"      => "00",
            "status" => 200
        ]);
    }

    /**
     * Update a task
     *
     * @return Task
     */
    public function updateTask(Task $task, Request $request)
    {
        $input = array_keys($request->all());
        foreach ($input as $input) {
            if (!array_key_exists($input, $task->getAttributes())) {
                throw new \Exception('Filed ' . $input . ' does not exist');
            }
        }
        $task->update($request->all());
        $updatedTask = $task->fill($request->all());

        return response()->json([
            "message"   => "Task Updated!",
            'data'      => $updatedTask,
            "code"      => "00",
            "status" => 200
        ]);
    }

    /**
     * Delete a task
     *
     */
    public function deleteATask(Task $task)
    {
        $task->delete();
        return response()->json([
            "message" => "Task Deleted!",
            "code"      => "00",
            "status" => 200
        ]);
    }
}
