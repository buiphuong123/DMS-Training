@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT USER') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('mess'))
                            <div class="alert" role="alert">
                                 {{session('mess')}}
                             </div>
                        @endif

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>
                            <div class="col-md-6">
                                <input id="username" name="username" class="form-control" value="{{ $user->username }}" readonly>
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('avatar') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ $user->avatar }}">
                                <img src="{{URL::to($user->avatar)}}" width=200 height=100>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="description">{{ $user->description }}</textarea>
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
