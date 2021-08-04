@if(session('success'))
    <div class="alert alert-success mt-4" role="alert">
        {{session('success')}}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger mt-4" role="alert">
        {{session('error')}}
    </div>
@endif