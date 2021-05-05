@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new Task of {{ $sheets->name }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sheet.task.store', $sheets->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="task_id" class="col-md-4 col-form-label text-md-right">{{ __('Task_id') }}</label>

                            <div class="col-md-6">
                                <input id="task_id" type="text" class="form-control @error('task_id') is-invalid @enderror" name="task_id"  required autocomplete="task_id" autofocus>

                                @error('task_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="infomation" class="col-md-4 col-form-label text-md-right">{{ __('infomation') }}</label>

                            <div class="col-md-6">
                                <textarea rol="5" col="5" id="infomation" type="text" class="form-control @error('infomation') is-invalid @enderror" name="infomation" required autocomplete="infomation"></textarea>

                                @error('infomation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                            <div class="col-md-6">
                                <textarea rol="5" col="5" id="time" type="text" class="form-control @error('time') is-invalid @enderror" name="time" required autocomplete="time"></textarea>

                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Task') }}
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

