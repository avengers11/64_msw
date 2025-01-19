<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title> || Admin Panel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('style\admin.css')}}">
    <script src='{{asset('script\jQuery.js')}}'></script>

</head>

<body>
    <!-- partial:index.partial.html -->

    <a href="{{ route("deposit.process") }}" class="deposit-logo">
        <img src="{{ asset("images/icons/deposit-logo.png") }}" alt="">
    </a>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="">
                Admin Panel
                <a class="nav-link  mr-lg-2" href="{{ route("deposit.process") }}">
                    <i class="fa-solid fa-wallet"></i>
                    <span class="text-light">Balance: 
                        <span class="badge badge-pill badge-primary">{{ \App\Models\users::where('username', session()->get('username'))->first()->balance; }} BDT</span>
                        <i class="fa-solid fa-plus text-light"></i>
                    </span>
                </a>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul  style="overflow-y: scroll;" class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    {{-- all users  --}}
                    <li class="nav-item {{Route::is('users.*') ? 'active' : ''}}" data-toggle="tooltip" data-placement="right" title="AllUsers">
                        <a class="nav-link nav-link-collapse {{Route::is('users.*') ? 'active' : ''}}" data-toggle="collapse" href="#collapseAllUsers" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span class="nav-link-text">USERS</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('users.*') ? 'show' : 'collapse'}}" id="collapseAllUsers">
                            <li>
                                <a style="{{Route::is('users.admin_all_web') ? 'color: green !important' : ''}}" href="{{route('users.admin_all_web')}}">ALL</a></a>
                            </li>
                            <li>
                                <a style="{{Route::is('users.admin_ban_web') ? 'color: green !important' : ''}}" href="{{route('users.admin_ban_web')}}">BAN</a></a>
                            </li>
                        </ul>
                    </li>

                    @if (admin_data(session() -> get('username'))['role'] == "1")
                        {{-- all resellers  --}}
                        <li class="nav-item {{Route::is('reseller.*') ? 'active' : ''}}" data-toggle="tooltip" data-placement="right" title="AllUsers">
                            <a class="nav-link nav-link-collapse {{Route::is('reseller.*') ? 'active' : ''}}" data-toggle="collapse" href="#collapseAllReseller" data-parent="#exampleAccordion">
                                <i class="fa-solid fa-gamepad"></i>
                                <span class="nav-link-text">RESELLER</span>
                            </a>
                            <ul class="sidenav-second-level {{Route::is('reseller.*') ? 'show' : 'collapse'}}" id="collapseAllReseller">
                                <li>
                                    <a style="{{Route::is('reseller.admin_all_web') ? 'color: green !important' : ''}}" href="{{route('reseller.admin_all_web')}}">ALL</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('reseller.admin_ban_web') ? 'color: green !important' : ''}}" href="{{route('reseller.admin_ban_web')}}">BAN</a></a>
                                </li>
                            </ul>
                        </li>

                        {{-- settings  --}}
                        <li class="nav-item {{Route::is('settings.*') || Route::is('deposit.settings') ? 'active' : ''}}" data-toggle="tooltip" data-placement="right" title="Settings">
                            <a class="nav-link nav-link-collapse {{Route::is('settings.*') || Route::is('deposit.settings') ? 'active' : ''}}" data-toggle="collapse" href="#collapseSettings" data-parent="#exampleAccordion">
                                <i class="fa-solid fa-gamepad"></i>
                                <span class="nav-link-text">Settings</span>
                            </a>
                            <ul class="sidenav-second-level {{Route::is('settings.*')  || Route::is('deposit.settings') ? 'show' : 'collapse'}}" id="collapseSettings">
                                <li>
                                    <a style="{{Route::is('settings.admin_slider_web') ? 'color: green !important' : ''}}" href="{{route('settings.admin_slider_web')}}">SLIDER</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('settings.admin_slider2_web') ? 'color: green !important' : ''}}" href="{{route('settings.admin_slider2_web')}}">SLIDER2</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('settings.admin_products_web') ? 'color: green !important' : ''}}" href="{{route('settings.admin_products_web')}}">All Server</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('settings.admin_category_web') ? 'color: green !important' : ''}}" href="{{route('settings.admin_category_web')}}">Category</a>
                                </li>
                                <li>
                                    <a style="{{Route::is('settings.urls_admin_urls_web') ? 'color: green !important' : ''}}" href="{{route('settings.urls_admin_urls_web')}}">URLS</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('settings.admin_login_page_web') ? 'color: green !important' : ''}}" href="{{route('settings.admin_login_page_web')}}">Login Page</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('settings.admin_contact_web') ? 'color: green !important' : ''}}" href="{{route('settings.admin_contact_web')}}">Contact US</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('deposit.settings') ? 'color: green !important' : ''}}" href="{{route('deposit.settings')}}">Deposit</a></a>
                                </li>
                            </ul>
                        </li>

                        {{-- package   --}}
                        <li class="nav-item {{Route::is('package.*') ? 'active' : ''}}" data-toggle="tooltip" data-placement="right" title="AllUsers">
                            <a class="nav-link {{Route::is('package.*') ? 'active' : ''}}" href="{{ route('package.index') }}" >
                                <i class="fa-solid fa-gamepad"></i>
                                <span class="nav-link-text">Package</span>
                            </a>
                        </li>

                        {{-- settings  --}}
                        <li class="nav-item {{Route::is('deposit.*') ? 'active' : ''}}" data-toggle="tooltip" data-placement="right" title="Deposit">
                            <a class="nav-link nav-link-collapse {{Route::is('deposit.*') ? 'active' : ''}}" data-toggle="collapse" href="#collapseDeposit" data-parent="#exampleAccordion">
                                <i class="fa-solid fa-gamepad"></i>
                                <span class="nav-link-text">Deposit</span>
                            </a>
                            <ul class="sidenav-second-level  {{Route::is('deposit.*') ? 'show' : 'collapse'}}" id="collapseDeposit">
                                <li>
                                    <a style="{{Route::is('deposit.index') ? 'color: green !important' : ''}}" href="{{ route('deposit.index') }}">Pending</a></a>
                                </li>
                                <li>
                                    <a style="{{Route::is('deposit.success') ? 'color: green !important' : ''}}" href="{{ route('deposit.success') }}">Success</a></a>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>

                {{-- navbar end  --}}
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                          </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input class="form-control" type="text" id="search_username" placeholder="Search for...">
                                <span class="input-group-append">
                                <button id="search_btn" class="btn btn-primary" type="button">
                                  <i class="fa fa-search"></i>
                                </button>
                              </span>
                            </div>
                        </form>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>

                </ul>

            </div>
        </nav>


        <div class="content-wrapper">
            <div class="container-fluid">



                <script>
                    $('#search_btn').click(function(){
                        $('#search_btn').html('<i class="fa-solid fa-spinner"></i>');
                        // ajax
                        $.ajax({
                            "url" : '{{ route('admin_users_search_api') }}',
                            "method" : "POST",
                            "data" : {
                                "username" : $('#search_username').val()
                            },
                            success:function(data){
                                if(data.st == true){
                                    $('#search_btn').html('<i class="fa-solid fa-check"></i>');
                                    window.location.href=window.location.origin+"/admin/users/update/"+data.id
                                }else{
                                    $('#search_btn').html('<i class="fa-solid fa-triangle-exclamation"></i>');
                                }
                            }
                        })
                    })
                </script>
