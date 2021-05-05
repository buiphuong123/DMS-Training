@extends('layouts.app')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                   <!-- @foreach($users as $user)
                    {{ $user->username}} </br>
                   @endforeach -->
                   <table>
                        <tr>
                            <th>#</th>
                            <th>username</th>
                            <th>email</th>
                            <th>roles</th>
                            <th>actions</th>
                        </tr>

                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td>
                                <!-- @can('edit-users') -->
                                <a href="{{route('admin.users.edit',$user->id)}}"> <button type="button" class="btn btn-primary float-left">Edit</button></a>
                                <!-- @endcan -->
                                <!-- @can('delete-users') -->
                                <form action="{{route('admin.users.destroy', $user)}}" class="float-left" method= "POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-warning">Delete</button>
                                </form>
                                <!-- @endcan -->
                            </td>
                        </tr>
                        @endforeach 
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection