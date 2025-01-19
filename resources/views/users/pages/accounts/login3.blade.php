<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V3</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/png" href="{{ asset('images/contact/'.$login['logo']) }}" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/ojXItLq3hvLa.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/DUQmVr9YlnuC.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/VAPYTEVH117t.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/p9GG7EqUUETl.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/khvU6jnYPEF4.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/OIMiIZExGmM2.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/iZcf2GBxChAo.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/0hjojaDbzKpJ.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/DbnV69Aw0Vcp.css" />
        <link rel="stylesheet" type="text/css" href="{{url('login/ac3')}}/css/TmtNw89Q5D2a.css" />
        <meta name="robots" content="noindex, follow" />
        <style>
            .wrap-login100{
                padding-top: 15px;
            }
            .logos img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 50%;
                box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff;
                margin: auto;
                display: block;
                margin-bottom: 15px;
            }
            .p-b-112{
                padding-bottom: 80px;
            }
            .add-to-cart-page{
                height: 50px;
                width: 50px;
                position: fixed;
                left: 10px;
                bottom: 20px;
                border-radius: 50%;
                padding: 3px;
                border: 3px solid #19C2AA;
                background: white;
                box-shadow: 5px 5px 15px #7e7e7e;
                animation: upDown 3s ease-in-out infinite;
                z-index: 1000;
            }

            @keyframes upDown {
                0%{
                    transform: translateY(20px);
                }
                90%{
                    transform: translateY(-20px);
                }
                100%{
                    transform: translateY(0);
                }
            }
        </style>
    </head>
    <body>
        <div class="container-login100" style="background-image: url({{ asset('images/contact/'.$login['background_img']) }});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                <form class="login100-form validate-form" id="submit_form">

                    <marquee style="padding-bottom: 15px; color:red" behavior="" direction="">{{$login->notice}}</marquee>

                    <div class="logos">
                        <img src="{{ asset('images/contact/'.$login['logo']) }}" alt="">
                    </div>

                    <span class="login100-form-title p-b-37">
                        Welcome
                    </span>
                    <div class="wrap-input100 validate-input m-b-20" data-validate="Enter your username">
                        <input class="input100" type="text" name="username" placeholder="Enter your username" id="login_username" autocomplete="off" required/>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button id="sub_btn" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-57 p-b-20">
                        <span class="txt1">
                            Contact Us
                        </span>
                    </div>
                    <div class="flex-c p-b-112">
                        @if($login['contact_us'] != null)
                            @foreach (json_decode($login['contact_us']) as $item)
                                <a href="{{$item->link}}" class="login100-social-item">
                                    <img src="{{ asset('images/contact/'.$item->logo) }}" alt="" />
                                </a>
                            @endforeach
                        @endif
                    </div>
                </form>
            </div>
        </div>
        @if ($login->buy_now == 1)
            <a href=""><img class="add-to-cart-page" src="{{asset("images\icons\add-cart.webp")}}" alt=""></a>
        @endif

        {{-- hidden input  --}}
        <input type="hidden" value="" id="city">
        <input type="hidden" value="" id="ip">
        <input type="hidden" value="" id="loc">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        {{-- script  --}}
        <script>
            const urls = {
                'login' : '{{ route('users_users_login_api') }}'
            }
        </script>
        <script src="{{ asset('script\users\accounts.js') }}?v=1.1.4"></script>


    </body>
</html>
