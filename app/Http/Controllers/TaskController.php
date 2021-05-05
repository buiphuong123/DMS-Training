<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\timesheet;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $sheets = TimeSheet::find($id);
       $tasks = $sheets->task; 
       return view('task.index')->with('tasks', $tasks)->with('sheets', $sheets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sheets = TimeSheet::find($id); 
        return view('task.create')->with('sheets', $sheets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request, $id)
    {
        $task = new Task();
        $task->task_id = $request->task_id;
        $task->infomation = $request->infomation;
        $task->time = $request->time;
        $task->save();
        $timesheet = TimeSheet::select('id')->where('id', $id)->first();
        $task->timesheet()->attach($timesheet);
        $request->session()->flash('success','create task success');
        return route('sheet.task.index', $id);
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
    public function edit($task, $sheet)
    {
        return view('')
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
