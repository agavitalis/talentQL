<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Interface TaskRepositoryInterface
 * @package App\Interfaces
 */
interface TaskRepositoryInterface
{
    /**
     * Create a task
     * @param task
     */
    public function createATask(array $taskRequest);

    /**
     * Get all tasks
     */
    public function getAllTasks();

}
