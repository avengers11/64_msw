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

<div class="card p-2 mb-5 d-none">
    <form action="{{ route('admin_settings_search_urls_api') }}" method="post">
        <div class="row">
            <h4>Search Link Server1</h4>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Link for 18+" value="{{ $data['link_18'] }}" name="link_18">
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Link for normal" value="{{ $data['normal_link'] }}" name="normal_link">
            </div>

            <h4 class="mt-4">Search Link Server2</h4>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Link for 18+" value="{{ $data['server2_18'] }}" name="server2_18">
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Link for normal" value="{{ $data['server2_normal'] }}" name="server2_normal">
            </div>

            <h4 class="mt-4">Search Link Server3</h4>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Link for 18+" value="{{ $data['server3_18'] }}" name="server3_18">
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Link for normal" value="{{ $data['server3_normal'] }}" name="server3_normal">
            </div>

            <div class="col-12">
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

<form method="post" action="{{ route('admin_change_mangement_api') }}" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label>Home Notice Text</label>
        <input type="text" class="form-control" name="news2" value="{{ $data['news2'] }}" />
    </div>

    <input type="submit" value="CONFIRM" class="btn btn-success">

</form>


@endsection
