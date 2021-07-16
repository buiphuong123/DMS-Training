<?php

namespace App\Services\Production;

use App\Services\Interfaces\TaskServiceInterface;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Models\TimeSheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskService extends BaseService implements TaskServiceInterface
{
    public function createTask(TimeSheet $sheet, array $data) {
        $task = $sheet->task()->create([
            'task_id' => \Arr::get($data, 'task_id'),
            'infomation' => \Arr::get($data, 'infomation'),
            'time' => \Arr::get($data, 'time'),
        ]);
        return $task;
    }

    public function updateTask(Task $task, array $data) {
        $tasks = $task->update([
            'task_id' => \Arr::get($data, 'task_id'),
            'infomation' => \Arr::get($data, 'infomation'),
            'time' => \Arr::get($data, 'time'),
        ]);
        return $tasks;
    }

    public function deleteTask(Task $task, Request $request) {
        $task->delete();
        return $task;
    }
}





