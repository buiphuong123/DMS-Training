@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
  <div>
    <h1>TIMESHEET MANAGMENT</h1>
  </div>

  <div class="col-md-6 text-right">
    <a href="{{route('sheet.create')}}" class="btn btn-primary">Add TimeSheet</a>
  </div>
</div>

  @if ($sheets->isEmpty())
    <p class="alert alert-sucess"> not TimeSheet</p>
  @else
      <table class="table">  
          <thead>
          <tr>
              <th scope="col">Employee</th>
              <th scope="col">TimeSheet</th>
              <th scope="col">management unit</th>
              <th scope="col">Hard</th>
              <th scope="col">Plan</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
              
          </tr>
          </thead>
          <tbody>
          @foreach($sheets as $sheet)
            <tr>
                  <td>{{ $sheet->user->username }}</td>
                  <td>{{ $sheet->name }}</td>
                  <td>{{ $sheet->user->permission->name }}</td>
                  <td>{{ $sheet->hard }}</td>
                  <td>{{ $sheet->plan }}</td>
                  <td>{{ $sheet->created_at }}</td>
                  <td>
                        <a href="{{ route('sheet.edit', $sheet->id) }}"><button type="submit" class="btn btn-primary">Edit</button></a>
                        <form action="{{ route('sheet.destroy', $sheet->id) }}" class="float-left" method= "POST">
                          @csrf
                          {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                        <a href="{{ route('sheet.task.index', $sheet->id) }}" class="btn btn-primary">Show Task</a>
                  </td>
                 
            </tr>
            @endforeach
            </tbody>
          </table>
          </div>
          
 @endif

@endsection
