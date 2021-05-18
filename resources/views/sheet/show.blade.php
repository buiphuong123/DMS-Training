@extends('layouts.app')

@section('content')
    <div class="container-fluid">
<div class="row">
  <div>
    <h1>TIMESHEET INFOMATION</h1>
  </div>
      <table class="table">
          <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">TimeSheet</th>
                <th scope="col">Hard</th>
                <th scope="col">Plan</th>
                <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                  <td>{{ $sheet->user->username }}</th>
                  <td>{{ $sheet->name}}</td>
                  <td>{{ $sheet->hard}}</td>
                  <td>{{ $sheet->plan}}</td>
                  <td>{{ $sheet->date_create }}</td>
            </tr>
@endsection
