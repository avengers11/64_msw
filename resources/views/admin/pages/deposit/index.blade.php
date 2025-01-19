@extends('admin.layout.master')
@section('admin_master')

<!-- Example DataTables Card-->
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

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> DATA TABLE
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>TranxID</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dataType) < 1)
                        <tr>
                            <td class="text-center" colspan="7">No data found!</td>
                        </tr>
                    @endif
                    @foreach ($dataType as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item->user->username}}</td>
                            <td>{{ $item['amount'] }}</td>
                            <td>{{ $item['method'] }}</td>
                            <td>{{ $item['tranx_id'] }}</td>
                            <td>
                                <a href="{{ asset("images/deposit/".$item['file']) }}" target="_BLANK"><img style="height: 50px" src="{{ asset("images/deposit/".$item['file']) }}" alt=""></a>
                            </td>
                            <td>
                                <a href="{{ route('users.admin_update_web', $item->user_id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                @if (Route::is('deposit.index'))
                                    <a href="{{ route('deposit.accept', $item) }}" class="btn btn-success"><i class="fa-duotone fa-solid fa-check"></i></a>
                                    <a href="{{ route('deposit.delete', $item) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="data" style="margin-top:2rem; margin-bottom:2rem">
        {{$dataType -> onEachSide(1) -> links()}}
    </div>
</div>

<style>
    tr td a.btn{
        text-transform: uppercase;
    }
    tr td img.images {
        height: 5rem;
        width: 5rem;
    }
</style>
@endsection
