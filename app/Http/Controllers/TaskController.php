<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\TimeSheet;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TimeSheet $sheet)
    {
        $tasks = $sheet->task; 
        return view('task.index')->with('tasks', $tasks)->with('sheets', $sheet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TimeSheet $sheet)
    { 
        return view('task.create')->with('sheets', $sheet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeSheet $sheet, CreateTaskRequest $request)
    {
        $sheet->task()->create([
            'task_id' => $request->input('task_id'),
            'infomation' => $request->input('infomation'),
            'time' => $request->input('time'),
        ]);
        $request->session()->flash('success','create task success');
        return redirect()->route('sheet.task.index', $sheet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $sheet, Task $task)
    {
        return view('task.edit', compact('task', 'sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, TimeSheet $sheet, Task $task)
    {
        $this->validate($request, [
            'task_id' => 'required', 'string', 'max:40',
            'infomation' => 'required', 'string', 'max:255',
            'time' => 'required',
        ]);
        $task->update([
            'task_id' => $request->task_id,
            'infomation' => $request->infomation,
            'time' => $request->time, 
        ]);
        $request->session()->flash('successTS','update task success');
        return redirect()->route('sheet.task.index', $sheet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSheet $sheet, Task $task, Request $request)
    {
        $task->delete();
        $request->session()->flash('success', 'delete Task success');
        return redirect()->route('sheet.task.index', $sheet);
    }
}
