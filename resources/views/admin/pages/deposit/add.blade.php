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
        <h5 class="card-title mb-4">Adjust Amount</h5>

        <form method="post" action="{{ route('deposit.store', $id) }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $id }}">

            <div class="form-group mb-3">
                <label>Amount</label>
                <input type="text" class="form-control" name="amount" />
            </div>
            
            <input type="submit" value="CONFIRM" class="btn btn-success">
        </form>
    </div>
</div>



@endsection
