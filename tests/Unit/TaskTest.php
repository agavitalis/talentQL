<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;


class TaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test  */
    public function task_database_has_expected_columns()
    {
        $this->assertTrue(
           Schema::hasColumns('tasks', [
            'task',
            'description',
            'comments',
            'start_time',
            'end_time',
            'is_task_all_day',
            'pending',
            'done',
            'ongoing',
            'completed'
           ])
       , true);
    }
}