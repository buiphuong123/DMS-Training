@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT TimeSheet') }}</div>
                <h1>{{ $sheets->date }}</h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('sheet.update', $sheets->id) }}">
                        @csrf
                        {{ method_field('PUT') }}

                        @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error}}</p>
                                @endforeach
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="name" name="name" class="form-control" value="{{ $sheets->user->username }}">
                            </div>  
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-6">
                                <input id="name" name="name" class="form-control" value="{{ $sheets->name }}">
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="hard" class="col-md-4 col-form-label text-md-right">{{ __('Hard') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="hard" value="{{ $sheets->hard }}">

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
                                <input id="plan" type="text" class="form-control" name="plan" value="{{ $sheets->plan }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_create" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_create" value="{{ $sheets->date_create }}"></input>
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
