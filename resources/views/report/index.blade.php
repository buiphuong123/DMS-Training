@extends('layouts.app')

@section('content')

<div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-inline" action="{{ route('report.index') }}">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-header card-header-rose card-header-text">
                                            <h5 class="card-title">TimeReport</h5>
                                        </div>
                                        <div class="card-body ">
                                            <div class="form-group bmd-form-group is-filled">
                                                <input type="month" id="month" name="date_create" value="<?php echo date('Y-m');?>">
                                                <button type="submit" class="btn btn-primary">Thống kê</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Bảng thống kê timesheet</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Tháng</th>
                                        <th>Tên nhân viên</th>
                                        <th>Số lần đăng ký trong tháng</th>
                                        <th>Số lần chậm đăng ký trong tháng</th>
                                        </thead>
                                        @if ( $count_timesheet->count() == 0 )
                                            <p class="alert alert-sucess"> This month not TimeSheet</p>
                                        @else
                                        <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td>{{ $month }}</td>
                                            <td>{{($user->username)}}</td>
                                            <td>{{ $count_timesheet->count() }}</td>
                                            <td>{{ $number-$count_timesheet->count() }}</td>
                                        </tr>
                                    </tbody>
                                    @endif
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection