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
        <a href="{{ route('settings.admin_login_page_add_web') }}" class="btn btn-success">ADD NEW</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Background Img</th>
                        <th>Notice</th>
                        <th>Page</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slider as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td><img class="images" src="{{ asset('images/contact/'.$item['logo']) }}" alt=""></td>
                            <td><img class="images" src="{{ asset('images/contact/'.$item['background_img']) }}" alt=""></td>
                            <td>{{ $item['notice'] }}</td>
                            <td>
                                @if ($item['login_page'] == 0)
                                    Draft
                                @else
                                    Page {{$item['login_page']}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('settings.admin_login_page_delete_web', $item) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ route('settings.admin_login_page_update_web', $item) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="data" style="margin-top:2rem; margin-bottom:2rem">
        {{$slider -> onEachSide(1) -> links()}}
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
