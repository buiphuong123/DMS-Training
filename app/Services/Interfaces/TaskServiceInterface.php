<?php

namespace App\Services\Interfaces;

use App\Models\Task;
use App\Models\TimeSheet;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Http\Request;

interface TaskServiceInterface
{
    public function createTask(TimeSheet $sheet, CreateTaskRequest $request);
    public function updateTask(UpdateTaskRequest $request, TimeSheet $sheet, Task $task);
    public function deleteTask(TimeSheet $sheet, Task $task, Request $request);
}

