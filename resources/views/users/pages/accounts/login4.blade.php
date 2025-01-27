<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V4</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{url('login/ac4')}}/css/mKKDdV2nkgi5.css" />
        <link rel="stylesheet" href="{{url('login/ac4')}}/css/Y4ZXCjZ02gJa.css" />
        <link rel="icon" type="image/png" href="{{ asset('images/contact/'.$login['logo']) }}" />
        <style>
            .logos img {
                width: 60px;
                height: 60px;
                object-fit: cover;
                border-radius: 50%;
                box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff;
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
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">

                            <marquee style="padding-bottom: 15px; color:red" behavior="" direction="">{{$login->notice}}</marquee>

                            <div class="logos">
                                <img src="{{ asset('images/contact/'.$login['logo']) }}" alt="">
                            </div>

                            <h3 class="text-center mb-4">Welcome</h3>
                            <form action="#" class="login-form" id="submit_form">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" placeholder="Username" required="" id="login_username" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5" id="sub_btn">Login</button>
                                </div>

                                <p style="margin-top: 10rem; text-align:center">Contact Us</p>
                                <div class="contact-us">
                                    @if($login['contact_us'] != null)
                                        @foreach (json_decode($login['contact_us']) as $item)
                                            <div class="open-contact-text">
                                                <div class="d-none hidden-content">
                                                    {!!  $item->link !!}
                                                </div>
                                                <img style="width: 3rem;height: 3rem;border-radius: 50%;" src="{{ asset('images/contact/'.$item->logo) }}" alt="">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($login->buy_now == 1)
            <a href=""><img class="add-to-cart-page" src="{{asset("images\icons\add-cart.webp")}}" alt=""></a>
        @endif
    </body>


    <div id="model-popup" class="d-none">
        <div class="model-wrapper">
            <div class="content-header">
                <h2>Notice</h2>
                <button class="close-model">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfH_A_k62GMbl6LBMwm269YoWCmUsTJOWk5A&s" alt="">
                </button>
            </div>
            <div class="content-body" id="model-content-wrapper">
            </div>
        </div>
    </div>
    <style>
        .d-none{
            display: none !important;
        }
        #model-popup{
            height: 100vh;
            width: 100%;
            
        }
        #model-popup .model-wrapper{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 0 100vh #000000a3;
            min-width: 85%;
            min-height: 50vh;
            background: white;
            border-radius: 25px;
            padding: 15px;
        }
        #model-popup .model-wrapper .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 20px;
        }
        #model-popup .model-wrapper .content-header button.close-model{
            outline: none;
            border: none;
        }
        #model-popup .model-wrapper .content-header button.close-model img{
            height: 35px;
        }
        
    </style>
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
</html>
