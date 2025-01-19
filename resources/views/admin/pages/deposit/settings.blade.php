@extends('admin.layout.master')
@section('admin_master')

<!--  -->
<div class="container">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif


    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Update Payment Method</h5>
    
            <form method="post" action="" class="row">
                @csrf
    
                <div class="form-group mb-3 col-6">
                    <label>Bkash Number</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_bkash_number }}" name="deposit_bkash_number" />
                </div>
                <div class="form-group mb-3 col-6">
                    <label>Bkash Info</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_bkash_info }}" name="deposit_bkash_info" />
                </div>
                <hr>
    
                <div class="form-group mb-3 col-6">
                    <label>Nagad Number</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_nagad_number }}" name="deposit_nagad_number" />
                </div>
                <div class="form-group mb-3 col-6">
                    <label>Nagad Info</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_nagad_info }}" name="deposit_nagad_info" />
                </div>
                <hr>
    
                <div class="form-group mb-3 col-6">
                    <label>Rocket Number</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_rocket_number }}" name="deposit_rocket_number" />
                </div>
                <div class="form-group mb-3 col-6">
                    <label>Rocket Info</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_rocket_info }}" name="deposit_rocket_info" />
                </div>
                <hr>
    
                <div class="form-group mb-3 col-6">
                    <label>Upay Number</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_upay_number }}" name="deposit_upay_number" />
                </div>
                <div class="form-group mb-3 col-6">
                    <label>Upay Info</label>
                    <input type="text" class="form-control" value="{{ $dataType->deposit_upay_info }}" name="deposit_upay_info" />
                </div>
                
                <input type="submit" value="CONFIRM" class="btn btn-success">
            </form>
        </div>
    </div>
</div>


@endsection
