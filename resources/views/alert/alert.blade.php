@if (session('success'))
    <div class="alert alert-primary" role="alert">
    {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
    {{session('error')}}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert">
    {{session('warning')}}
    </div>
@endif


@if (session('successTS'))
    <div class="alert alert-primary" role="alert">
    {{session('successTS')}}
    </div>
@endif



