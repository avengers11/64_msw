<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V5</title>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="{{ asset('images/contact/'.$login['logo']) }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{url('login/ac5')}}/css/yC9Tkq55ZTXK.css" />
        <link rel="stylesheet" href="{{url('login/ac5')}}/css/Z4VT233Cg7Y0.css" />
        <style>
            .logos img {
                width: 60px;
                height: 60px;
                object-fit: cover;
                border-radius: 50%;
                box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #e9e9e9, 8px 8px 15px #535353, -8px -8px 15px #161616;
                margin: auto;
                display: block;
                margin-bottom: 15px;
            }
            .contact-us{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
                gap: 10px;
            }
            .contact-us img{
                height: 40px
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
    <body style="background-image: url({{ asset('images/contact/'.$login['background_img']) }});">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap py-5">
                            <marquee style="padding-bottom: 15px; color:red" behavior="" direction="">{{$login->notice}}</marquee>

                            <div class="logos">
                                <img src="{{ asset('images/contact/'.$login['logo']) }}" alt="">
                            </div>

                            <h3 class="text-center mb-0">Welcome</h3>
                            <form action="#" class="login-form" id="submit_form">
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                    <input type="text" class="form-control" placeholder="Username" required="" id="login_username" autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn form-control btn-primary rounded submit px-3" id="sub_btn">Login</button>
                                </div>
                            </form>
                            <div class="w-100 text-center mt-4 text">
                                <a class="">Contact Us</a>

                                <div class="contact-us mt-2">
                                    @if($login['contact_us'] != null)
                                        @foreach (json_decode($login['contact_us']) as $item)
                                            <a href="{{$item->link}}" class="contact">
                                                <img src="{{ asset('images/contact/'.$item->logo) }}" alt="" />
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
