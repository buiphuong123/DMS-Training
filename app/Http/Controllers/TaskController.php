<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\TimeSheet;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\Interfaces\TaskServiceInterface;

class TaskController extends Controller
{
    protected $taskService;
                                    
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TimeSheet $sheet)
    {
        $tasks = $sheet->task; 
        return view('task.index', ['tasks' => $tasks, 'sheets' => $sheet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TimeSheet $sheet)
    { 
        return view('task.create', ['sheets' => $sheet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeSheet $sheet, CreateTaskRequest $request)
    {
        if ($this->taskService->createTask($sheet, $request)) {
            $request->session()->flash('success','create task success');
        }
        else {
            $request->session()->flash('error','create task error');
        }
        
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
        if ($this->taskService->updateTask($request, $sheet, $task)) {
            $request->session()->flash('successTS','update task success');
        }
        else {
            $request->session()->flash('error','update task not success');
        }
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
        if ($this->taskService->deleteTask($sheet, $task, $request)) {
            $request->session()->flash('success', 'delete Task success');
        }
        else {
            $request->session()->flash('error', 'delete Task  not success');
        }
        
        return redirect()->route('sheet.task.index', $sheet);
    }
}
