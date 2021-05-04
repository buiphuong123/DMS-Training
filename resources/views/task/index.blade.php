@extends('layouts.app')

@section('content')
  
 
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
                  <td>{{$task->task_id}}</th>
                  <td>{{$task->infomation}}</td>
                  <td>{{$task->time}}</td>
                  <td>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <form action="#" class="float-left" method= "POST">
                          @csrf
                          {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                  </td>
            </tr>
            @endforeach
            </tbody>
        </table>
     
@endsection
