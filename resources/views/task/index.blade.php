@extends('layouts.app')

@section('content')

<h1 style="text-align: center;color: red">{{ $sheets->name }}</h1>
@if ($tasks->isEmpty())
    <p class="alert alert-sucess"> not task</p>
@else
<table class="table">  
          <thead>
          <tr>
              <th scope="col">task_id</th>
              <th scope="col">infomation</th>
              <th scope="col">Time</th>
              <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($tasks as $task)
            <tr>
                  <td>{{ $task->task_id }}</th>
                  <td>{{ $task->infomation }}</td>
                  <td>{{ $task->time }}</td>
                  <td>
                        <a href="{{ route('sheet.task.edit', [$sheets->id, $task->id]) }}"><button type="submit" class="btn btn-primary">Edit</button></a>
                        <form action="{{ route('sheet.task.destroy', [$sheets->id, $task->id]) }}" class="float-left" method= "POST">
                          @csrf
                          {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                  </td>
            </tr>
            @endforeach
            </tbody>
        </table>
  @endif  
@endsection
