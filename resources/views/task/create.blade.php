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
                        @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error}}</p>
                                @endforeach
                        @endif
                        <div class="form-group row">
                            <label for="task_id" class="col-md-4 col-form-label text-md-right">{{ __('Task_id') }}</label>

                            <div class="col-md-6">
                                <input id="task_id" type="text" class="form-control" name="task_id" value="{{ old('task_id', 'N/A') }}" >
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="infomation" class="col-md-4 col-form-label text-md-right">{{ __('infomation') }}</label>

                            <div class="col-md-6">
                                <textarea rol="5" col="5" id="infomation" class="form-control" name="infomation"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                            <div class="col-md-6">
                                <textarea rol="5" col="5" id="time" type="text" class="form-control" name="time"></textarea>
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

