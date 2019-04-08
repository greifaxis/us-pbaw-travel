@forelse($errors->all() as $error)
    <div class="alert alert-warning col-sm-5">
        {{$error}}
    </div>
@empty
@endforelse

@if(session('success'))
    <div class="alert alert-success col-sm-5">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger col-sm-5">
        {{session('error')}}
    </div>
@endif