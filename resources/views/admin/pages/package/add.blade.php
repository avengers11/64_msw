@extends('admin.layout.master')
@section('admin_master')

<!--  -->
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-4">Add New Package</h5>

        <form method="post" action="{{ route('package.store') }}">
            @csrf

            <div class="form-group mb-3">
                <label>Package name</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group mb-3">
                <label>Package price</label>
                <input type="text" class="form-control" name="amount" />
            </div>
            <div class="form-group mb-3">
                <label>Package login limit</label>
                <input type="number" class="form-control" name="login_time" />
            </div>
            <div class="form-group mb-3">
                <label>Package validity</label>
                <input type="string" class="form-control" name="validity" />
            </div>
            
            <input type="submit" value="CONFIRM" class="btn btn-success">
        </form>
    </div>
</div>



@endsection
