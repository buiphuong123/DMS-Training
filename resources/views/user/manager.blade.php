@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
  <div>
    <h1>MANAGMENT USERS</h1>
  </div>
  @if ($users->isEmpty())
    <p class="alert alert-sucess"> not user</p>
  @else
      <table class="table">  
          <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Unit managment</th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            @if ($user->hasAnyRoles(['user']))
                <tr>
                    <td>{{$loop->index}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->permission->name}}</td>
                </tr>
            @endif
         @endforeach
            </tbody>
          </table>
          </div>
 @endif

@endsection

