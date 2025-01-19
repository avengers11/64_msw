@extends('admin.layout.master')
@section('admin_master')

<!--  -->
<div class="container">
    <div class="row">
        @if (session()->has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>


<div class="card">
    <div class="card-header">
        Add Login Page
    </div>
    <div class="card-body">
        <form method="post" action="{{route('settings.admin_login_page_update_submit_web', $login)}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label>Select Login Page</label>
                <select name="login_page" class="form-select">
                    <option @if($login->login_page == 0) selected @endif value="0">Draft</option>
                    <option @if($login->login_page == 1) selected @endif value="1">Login Page 1</option>
                    <option @if($login->login_page == 2) selected @endif value="2">Login Page 2</option>
                    <option @if($login->login_page == 3) selected @endif value="3">Login Page 3</option>
                    <option @if($login->login_page == 4) selected @endif value="4">Login Page 4</option>
                    <option @if($login->login_page == 5) selected @endif value="5">Login Page 5</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Buy Now Option</label>
                <select name="buy_now" class="form-select">
                    <option  @if($login->buy_now == 1) selected @endif value="1">On</option>
                    <option  @if($login->buy_now == 0) selected @endif value="0">Off</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Logo</label>
                <br>
                <img style="height: 100px" src="{{ asset('images/contact/'.$login['logo']) }}" alt="">
                <input type="file" class="form-control" name="logo"  />
            </div>
            <div class="form-group mb-3">
                <label>Background Image</label>
                <br>
                <img style="height: 100px" src="{{ asset('images/contact/'.$login['background_img']) }}" alt="">
                <input type="file" class="form-control" name="background_img"  />
            </div>
            <div class="form-group mb-3">
                <label>Notice</label>
                <input type="text" class="form-control" name="notice" value="{{$login['notice']}}"/>
            </div>

            <div class="card mb-3">
                <div class="card-header">Contact Us <button class="btn btn-primary" id="addNewContact" type="button">ADD</button></div>
                <div class="card-body" id="contactUsWrapper">

                    @if($login['contact_us'] != null)
                        @foreach (json_decode($login['contact_us']) as $item)
                            <div class="box-mr mb-3">
                                <div class="form-group mb-3">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="links[]" value="{{$item->link}}"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Logo</label>
                                    <br>
                                    <img style="height: 100px" src="{{ asset('images/contact/'.$item->logo) }}" alt="">
                                    <input type="file" class="form-control" name="logos[]"  />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger removeContactUs" type="button">Delete</button>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>


            <input type="submit" value="CONFIRM" class="btn btn-success">
        </form>
    </div>
</div>

@endsection

<style>
    .box-mr {
        border: 1px solid #dddd;
        padding: 15px;
        border-radius: 7px;
        background: #ebebebdd;
    }
</style>

@push('js')
    <script>
        $("#addNewContact").click(function(){
            $("#contactUsWrapper").append(`
                <div class="box-mr mb-3">
                    <div class="form-group mb-3">
                        <label>Link</label>
                        <input type="text" class="form-control" name="links[]" />
                    </div>
                    <div class="form-group mb-3">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logos[]"  />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger removeContactUs" type="button">Delete</button>
                    </div>
                </div>
            `);
        });

        $(document).on("click", ".removeContactUs", function(){
            $(this).closest(".box-mr").remove();
        });
    </script>
@endpush

