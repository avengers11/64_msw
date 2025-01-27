<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('images/contact/'.$login['logo']) }}" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('login/ac2')}}/css/main.css">

    <style>
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
        .login100-form-title {
            display: block;
            font-family: Poppins-Bold;
            font-size: large;
            color: #333333;
            line-height: 1.2;
            text-align: center;
            padding-bottom: 10px;
            font-size: 1.4rem;
        }
    </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url({{ asset('images/contact/'.$login['background_img']) }});">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="padding-bottom: 15px;">
				<form class="login100-form validate-form" id="submit_form">
                    <marquee style="padding-bottom: 15px;color:red" behavior="" direction="">{{$login->notice}}</marquee>

                    <div class="logos">
                        <img src="{{ asset('images/contact/'.$login['logo']) }}" alt="">
                    </div>

					<span class="login100-form-title p-b-49">
						WELCOME
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Enter your username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username" id="login_username" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="sub_btn">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20" style="
                    padding-top: 10px;
                    padding-bottom: 10px;">
						<span>
							Contact Us
						</span>
					</div>

					<div class="flex-c-m">
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
    @if ($login->buy_now == 1)
        <a href=""><img class="add-to-cart-page" src="{{asset("images\icons\add-cart.webp")}}" alt=""></a>
    @endif
    <div id="model-popup" class="d-none">
        <div class="model-wrapper">
            <div class="content-header">
                <button class="close-model">
                    <img src="{{ asset("images/icons/close.png") }}" alt="">
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
        #model-popup .model-wrapper button.close-model{
            position: absolute;
            right: 10px;
            top: 6px;
        }
        #model-popup .model-wrapper{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 0 100vh #000000a3;
            min-width: 85%;
            background: white;
            border-radius: 25px;
            padding: 15px;
            z-index: 100;
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
            height: 26px;
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


</body>
</html>
