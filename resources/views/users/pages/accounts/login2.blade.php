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
    </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url({{ asset('images/contact/'.$login['background_img']) }});">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
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

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Contact Us
						</span>
					</div>

					<div class="flex-c-m">
                        @if($login['contact_us'] != null)
                            @foreach (json_decode($login['contact_us']) as $item)
                                <a href="{{$item->link}}" class="login100-social-item bg1">
                                    <img class="contact-us-img" src="{{ asset('images/contact/'.$item->logo) }}" alt="">
                                </a>
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
