<?php

namespace App\Services\Interfaces;

use App\Models\Task;
use App\Models\TimeSheet;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Http\Request;

interface TaskServiceInterface
{
    public function createTask(TimeSheet $sheet, array $data);
    public function updateTask(Task $task, array $data);
    public function deleteTask(Task $task, Request $request);
}

