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
    public function createTask(TimeSheet $sheet, CreateTaskRequest $request) {
        $task = $sheet->task()->create([
            'task_id' => $request->input('task_id'),
            'infomation' => $request->input('infomation'),
            'time' => $request->input('time'),
        ]);
        return $task;
    }

    public function updateTask(UpdateTaskRequest $request, TimeSheet $sheet, Task $task) {
        $tasks = $task->update([
            'name' => $request->name,
            'hard' => $request->hard,
            'plan' => $request->plan,
            'date_create' => $request->date_create,
        ]);
        return $tasks;
    }

    public function deleteTask(TimeSheet $sheet, Task $task, Request $request) {
        $task->delete();
        return $task;
    }
}





