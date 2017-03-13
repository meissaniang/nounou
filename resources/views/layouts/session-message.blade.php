@if(session('erreur'))
    <div class="alert alert-danger">
        {{session('erreur')}}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif