@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT TimeSheet') }}</div>
                <h1>{{$sheets->date}}</h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('sheet.update', $sheets->id) }}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-6">
                                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus value="{{$sheets->user->username}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-6">
                                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus value="{{$sheets->name}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="hard" class="col-md-4 col-form-label text-md-right">{{ __('Hard') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('hard') is-invalid @enderror" name="hard"  required autocomplete="hard" value="{{$sheets->hard}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Plan') }}</label>

                            <div class="col-md-6">
                                <input id="plan" type="text" class="form-control @error('plan') is-invalid @enderror" name="plan" value="{{$sheets->plan}}">
                               
                                @error('plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_create" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control @error('date_create') is-invalid @enderror" name="date_create" value="{{$sheets->date_create}}"></input>

                                @error('date_create')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
