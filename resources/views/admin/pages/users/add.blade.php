@extends('admin.layout.master')
@section('admin_master')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css'>

<!--  -->
<div class="container">
    @if (session() -> has('msg'))
        <div class="alert @if(session() -> get('status')) alert-success @else alert-danger @endif col-12" role="alert">
            <h4 class="alert-heading">Alert</h4>
            <hr>
            <p>{{session() -> get('msg')}}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">
                <span>Add New User</span>
            </h5>
    
            <form method="post" action="{{ route('admin_users_add_api') }}">

                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username..." required />
                </div>
                
                @if(admin_data(session() -> get('username'))['role'] == "1")
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password..." value="00000000" />
                    </div>
                @endif
                <div class="form-group mb-3">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="number" placeholder="number..." value="" />
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email..." value="" />
                </div>

                <div class="form-group mb-3">
                    <label>User 18+??</label>
                    <select name="user_adult" class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            
                <div class="form-group mb-3">
                    <label>Access details</label>
                    <br>
                    <select name="access_server[]" class="form-control selectpicker" multiple aria-label="Default select example" data-live-search="true">
                        <option value="0" selected>All</option>
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group mb-3">
                    <label>Slider Type</label>
                    <select name="slider" class="form-select">
                        <option value="Slider 1">Slider 1</option>
                        <option value="Slider 2">Slider 2</option>
                    </select>
                </div>
            
                @if(admin_data(session() -> get('username'))['role'] == "1")
                    <div class="form-group mb-3">
                        <label>User can access products?</label>
                        <select name="products_access" class="form-select">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Login time</label>
                        <input type="number" class="form-control" name="login_time" placeholder="Login time..." required />
                    </div>
                
                    <div class="form-group mb-3">
                        <label>Expired date (Days)</label>
                        <input type="number" class="form-control" name="expired" placeholder="Expired date..." required />
                    </div>

                    <div class="form-group mb-3">
                        <label>Account Type</label>
                        <select name="role" class="form-select">
                            <option value="0">USERS</option>
                            <option value="2">RESELLER</option>
                        </select>
                    </div>
                @endif
            
                <div class="form-group mb-3">
                    <label>Note</label>
                    <textarea class="form-control" style="height:150px" name="note"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label>User can't access product</label>
                    <textarea class="form-control" style="height:150px" name="cant_access_notice">
Contact to the following number.
<br>
WhatsApp Number: <span class="copy-number">{{ isset($user->number) ? $user->number : "" }}</span>
                    </textarea>
                </div>

                <hr>
                <div class="form-group mb-3">
                    <label class="d-flex align-items-center justify-content-between">
                        <span>Add a plan to this user</span>
                        <a href="{{ route("package.lists") }}" class="btn btn-primary btn-sm">View Packages</a>
                    </label>
                    <select name="package_id" class="form-select">
                        <option value="">Select a package</option>
                        @foreach ($packages as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->amount }}BDT</option>
                        @endforeach
                    </select>
                </div>
            
                <input type="submit" value="CONFIRM" class="btn btn-success">
            
            </form>

        </div>
    </div>
</div>


<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js'></script>
@endsection
