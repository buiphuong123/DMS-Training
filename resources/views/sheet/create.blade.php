@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new TimeSheet') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sheet.store') }}">
                        @csrf
                        @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error}}</p>
                                @endforeach
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('TimeSheet') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="hard" class="col-md-4 col-form-label text-md-right">{{ __('Hard') }}</label>

                            <div class="col-md-6">
                                <textarea rol="5" col="5" id="hard" type="text" class="form-control" name="hard"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plan" class="col-md-4 col-form-label text-md-right">{{ __('Plan') }}</label>

                            <div class="col-md-6">
                                <textarea rol="5" col="5" id="plan" type="text" class="form-control" name="plan"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_create" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_create" value="<?php echo date('Y-m-d');?>"></input>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add TimeSheet') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

