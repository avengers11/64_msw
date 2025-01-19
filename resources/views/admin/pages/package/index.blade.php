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
        <a href="{{ route('package.add') }}" class="btn btn-success">ADD NEW</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Login Limit</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dataType) < 1)
                        <tr>
                            <td class="text-center" colspan="6">No data found!</td>
                        </tr>
                    @endif
                    @foreach ($dataType as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['amount'] }}</td>
                            <td>{{ $item['login_time'] }}</td>
                            <td>{{ $item['validity'] }}</td>
                            <td>
                                <a href="{{ route('package.delete', $item) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ route('package.edit', $item) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
