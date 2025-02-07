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
            <h5 class="card-title mb-4 d-flex align-items-center justify-content-between">
                <span>Update User</span>
                @if(admin_data(session() -> get('username'))['role'] == "1")
                <a href="{{ route("deposit.add", $id) }}" class="btn btn-success">Deposit</a>
                @endif
            </h5>

            <p> Expired In:
                @if ($data['expired'] < time())
                    Expired
                @else
                    {{ !empty($data->expired_format['months']) ? $data->expired_format['months']."Mo" : "" }}
                    {{ !empty($data->expired_format['days']) ? $data->expired_format['days']."d" : "" }}
                    {{ !empty($data->expired_format['hours']) ? $data->expired_format['hours']."h" : "" }}
                    {{ !empty($data->expired_format['minutes']) ? $data->expired_format['minutes']."m" : "" }}
                @endif
            </p>
            <form method="post" action="{{ route('admin_users_update_api', ['id' => $id]) }}">

                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username..." value="{{ $data['username'] }}"  />
                </div>

                @if(admin_data(session() -> get('username'))['role'] == "1")
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password..." value="{{ $data['password'] }}"  />
                    </div>
                @endif

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email..." value="{{ $data['email'] }}" />
                </div>

                <div class="form-group mb-3">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="number" placeholder="number..." value="{{ $data['number'] }}" />
                </div>

                @if(admin_data(session() -> get('username'))['role'] == "1")
                    <div class="form-group mb-3">
                        <label>User can access products?</label>
                        <select name="products_access" class="form-select">
                            <option value="Yes" @if($data['products_access'] == 'Yes') selected @endif>Yes</option>
                            <option value="No" @if($data['products_access'] == 'No') selected @endif>No</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Login time</label>
                        <input type="number" class="form-control" name="login_time" placeholder="Login time..." value="{{ intval($data['login_time']) }}"/>
                    </div>
                    <div class="form-group mb-2">
                        <label>Expired date</label>
                        <input type="text" class="form-control" name="expired" placeholder="Expired date..." value="{{ ($data['expired'] - time())/86400 }}"/>
                    </div>

                    <div class="form-group mb-3">
                        <label>User 18+??</label>
                        <select name="user_adult" class="form-select" style="text-transform: capitalize;">
                            <option value="{{$data['user_adult']}}">{{$data['user_adult']}}</option>
                            <option value="yes" class="@if($data['user_adult'] == "yes") d-none @endif">Yes</option>
                            <option value="no" class="@if($data['user_adult'] == "no") d-none @endif">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Slider Type</label>
                        <select name="slider" class="form-select">
                            <option value="{{$data['slider']}}">{{$data['slider']}}</option>
                            <option value="Slider 1" class="@if($data['slider'] == "Slider 1") d-none @endif">Slider 1</option>
                            <option value="Slider 2" class="@if($data['slider'] == "Slider 2") d-none @endif">Slider 2</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Access details</label>
                        <br>
                        <select name="access_server[]" class="form-control selectpicker" multiple aria-label="Default select example" data-live-search="true">
                            @php
                                $severArray = !empty(json_decode($data['access_server'])) ? json_decode($data['access_server']) : [];
                            @endphp
    
                            @if (in_array(0, $severArray))
                                <option value="0" selected>All</option>
                            @else
                                <option value="0">All</option>
                            @endif
                            @foreach ($category as $item)
    
                                <option @if(in_array($item->id, $severArray)) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                

                <div class="form-group mb-3">
                    <label>Notification</label>
                    <textarea class="form-control" style="height:150px" name="note">{{$data['note']}}</textarea>
                </div>
                <div class="form-group mb-3 d-none">
                    <label>Expired notice</label>
                    <textarea class="form-control" style="height:150px" name="cant_access_notice">{!! $data['cant_access_notice'] !!}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="d-flex align-items-center justify-content-between">
                        <span>Add a plan to this user</span>
                        <a href="" class="btn btn-primary btn-sm">View Packages</a>
                    </label>
                    <select name="package_id" class="form-select">
                        <option value="">Select a package</option>
                        @foreach ($packages as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->amount }}BDT</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="CONFIRM" class="btn btn-success">
                <a href="{{ route('admin_users_ban_api', ['id' => $id]) }}" class="btn btn-danger">BAN</a>
            </form>


            @foreach ($devices as $device)
                <div class="card mt-5  @if($data['role'] != "0") d-none @endif">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Recent Login - {{$device->device}}
                        <a href="{{route('admin_users_device_delete_api', $device)}}" class="btn btn-danger">Delete</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>IP</th>
                                        <th>Location</th>
                                        <th>City</th>
                                        <th>Browser ID</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $users = \App\Models\loging_log::orderBy("id", 'DESC') -> where("username", $data['username']) -> where('device_id', $device->id) -> paginate(10);
                                    @endphp
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item['ip'] }}</td>
                                            <td>{{ $item['loc'] }}</td>
                                            <td>{{ $item['city'] }}</td>
                                            <td>{{ $item['browser_id'] }}</td>
                                            <td>
                                                @php
                                                    $inputDate = $item['created_at'];
                                                    $timestamp = strtotime($inputDate);
                                                    $formattedDate = date('j M, Y h:i:s A', $timestamp);
                                                    echo $formattedDate;
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="data" style="margin-top:2rem; margin-bottom:2rem">
                        {{$users -> onEachSide(1) -> links()}}
                    </div>

                </div>
            @endforeach



            <div class="card mt-5  @if($data['role'] == "0") d-none @endif">
                <div class="card-header">
                    <i class="fa fa-table"></i> Total users({{\App\Models\users::where("creator_role", $id) -> where("role", "0") -> count()}})
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Expired date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $reseller_users = \App\Models\users::where("creator_role", $id) -> where("role", "0") -> paginate(10);
                                @endphp
                                @foreach ($reseller_users as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['username'] }}</td>
                                        <td>{{ ( $item['expired'] - time())/86400 }}</td>
                                        <td>
                                            <a href="{{ route('admin_users_ban_api', ['id' => $item['id']]) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            <a href="{{ route('users.admin_update_web', ['id' => $item['id']]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="data" style="margin-top:2rem; margin-bottom:2rem">
                    {{$reseller_users -> onEachSide(1) -> links()}}
                </div>

            </div>
        </div>
    </div>
</div>

    
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js'></script>
@endsection
