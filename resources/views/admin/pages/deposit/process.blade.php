<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Responsive Payment Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
        <style>
            :root {
                --field-border: 1px solid #eeeeee;
                --field-border-radius: 0.5em;
                --secondary-text: #aaaaaa;
                --sidebar-color: #f1f1f1;
                --accent-color: #2962ff;
            }

            * {
                box-sizing: border-box;
            }

            .flex {
                display: flex;
            }
            .flex-center {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .flex-fill {
                display: flex;
                flex: 1 1;
            }
            .flex-vertical {
                display: flex;
                flex-direction: column;
            }
            .flex-vertical-center {
                display: flex;
                align-items: center;
            }
            .flex-between {
                display: flex;
                justify-content: space-between;
            }
            .p-sm {
                padding: 0.5em;
            }
            .pl-sm {
                padding-left: 0.5em;
            }
            .pr-sm {
                padding-right: 0.5em;
            }
            .pb-sm {
                padding-bottom: 0.5em;
            }
            .p-md {
                padding: 1em;
            }
            .pb-md {
                padding-bottom: 1em;
            }
            .p-lg {
                padding: 2em;
            }
            .m-md {
                margin: 1em;
            }
            .size-md {
                font-size: 0.85em;
            }
            .size-lg {
                font-size: 1.5em;
            }
            .size-xl {
                font-size: 2em;
            }
            .half-width {
                width: 50%;
            }

            .pointer {
                cursor: pointer;
            }
            .uppercase {
                text-transform: uppercase;
            }
            .ellipsis {
                text-overflow: ellipsis;
                overflow: hidden;
            }

            .f-main-color {
                color: #2962ff;
            }
            .f-secondary-color {
                color: var(--secondary-text);
            }
            .b-main-color {
                background: var(--accent-color);
            }
            .numbers::-webkit-outer-spin-button,
            .numbers::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            body {
                font-size: 14px;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .bod-3 {
                border-radius: 30px;
            }
            .main-back {
                background: #a2cdff !important;
                display: flex;
                position: absolute;
                width: 100%;
                height: 100vh;
                top: 0px;
                left: 0px;
            }
            .header {
                padding-bottom: 1em;
            }

            .header .title {
                font-size: 1.2em;
            }
            .header .title span {
                font-weight: 300;
            }

            .card-data > div {
                padding-bottom: 1.5em;
            }
            .card-data > div:first-child {
                padding-top: 1.5em;
            }

            .card-property-title {
                display: flex;
                justify-content: center;
                flex-direction: column;
                flex: 1 1;
                margin-right: 0.5em;
            }
            .card-property-title strong {
                padding-bottom: 0.5em;
                font-size: 0.85em;
            }
            .card-property-title span {
                color: var(--secondary-text);
                font-size: 0.75em;
            }
            .card-property-value {
                flex: 1 1;
            }

            .card-number {
                background: #fafafa;
                border: var(--field-border);
                border-radius: var(--field-border-radius);
                padding: 0.5em 1em;
            }
            .card-number-field * {
                line-height: 1;
                margin: 0;
                padding: 0;
            }
            .card-number-field input {
                width: 100%;
                height: 100%;
                padding: 0.5em 1rem;
                margin: 0 0.75em;
                border: none;
                color: #888888;
                background: transparent;
                font-family: inherit;
                font-weight: 500;
            }

            .timer span {
                background: #311b92;
                color: #ffffff;
                width: 1.2em;
                padding: 4px 0;
                display: inline-block;
                text-align: center;
                border-radius: 3px;
            }
            .timer span + span {
                margin-left: 2px;
            }
            .timer em {
                font-style: normal;
            }

            .action{
                gap: 10px;
            }
            .action button {
                padding: 1.1em;
                width: 100%;
                height: 100%;
                font-weight: 600;
                font-size: 1em;
                color: #ffffff;
                border: none;
                border-radius: 0.5em;
                transition: background-color 0.2s ease-in-out;
            }
            .action button:hover {
                background: #2979ff;
            }

            .input-container {
                position: relative;
                display: flex;
                align-items: center;
                height: 3em;
                overflow: hidden;
                border: var(--field-border);
                border-radius: var(--field-border-radius);
            }
            .input-container input,
            .input-container i {
                line-height: 1;
            }
            .input-container input {
                flex: 1 1;
                height: 100%;
                width: 100%;
                text-align: center;
                border: none;
                border-radius: var(--field-border-radius);
                font-family: inherit;
                font-weight: 800;
                font-size: 0.85em;
            }
            .input-container input:focus {
                background: #e3f2fd;
                color: #283593;
            }
            .input-container input::placeholder {
                color: #7e7e7e;
            }
            .input-container input::-webkit-outer-spin-button,
            .input-container input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            select {
                height: 100%;
                width: 100%;
                text-align: center;
                border: none;
                border-radius: var(--field-border-radius);
                font-family: inherit;
                font-weight: 800;
                font-size: 0.85em;
                background: #fafafa;
                border: 1px solid #dddd;
                padding: 10px;
                outline: none;
            }
            .input-container i {
                position: absolute;
                right: 0.5em;
            }

            .purchase-section {
                position: relative;
                overflow: visible;
                padding: 0 1em 1em 1em;
                background: var(--sidebar-color);
                border-top-left-radius: 0.8em;
                border-top-right-radius: 0.8em;
            }
            .purchase-section:before {
                content: "";
                position: absolute;
                width: 1.6em;
                height: 1.6em;
                border-radius: 50%;
                left: -0.8em;
                bottom: -0.8em;
                background: #ffffff;
            }
            .purchase-section:after {
                content: "";
                position: absolute;
                width: 1.6em;
                height: 1.6em;
                border-radius: 50%;
                right: -0.8em;
                bottom: -0.8em;
                background: #ffffff;
            }

            .card-mockup {
                position: relative;
                margin: 3em 1em 1.5em 1em;
                padding: 1.5em 1.2em;
                border-radius: 0.6em;
                background: #72a2f7;
                color: #fff;
                box-shadow: 0 0.5em 1em 0.125em rgba(0, 0, 0, 0.1);
            }
            .card-mockup:after {
                content: "";
                position: absolute;
                width: 25%;
                top: -0.2em;
                left: 37.5%;
                height: 0.2em;
                background: var(--accent-color);
                border-top-left-radius: 0.2em;
                border-top-right-radius: 0.2em;
            }
            .card-mockup:before {
                content: "";
                position: absolute;
                top: 0;
                width: 25%;
                left: 37.5%;
                height: 0.5em;
                background: #2962ff36;
                border-bottom-left-radius: 0.2em;
                border-bottom-right-radius: 0.2em;
                box-shadow: 0 2px 15px 5px #2962ff4d;
            }

            .purchase-props {
                margin: 0;
                padding: 0;
                font-size: 0.8em;
                width: 100%;
            }
            .purchase-props li {
                width: 100%;
                line-height: 2.5;
            }
            .purchase-props li span {
                color: var(--secondary-text);
                font-weight: 600;
            }

            .separation-line {
                border-top: 1px dashed #aaa;
                margin: 0 0.8em;
            }

            .total-section {
                position: relative;
                overflow: hidden;

                padding: 1em;
                background: var(--sidebar-color);
                border-bottom-left-radius: 0.8em;
                border-bottom-right-radius: 0.8em;
            }
            .total-section:before {
                content: "";
                position: absolute;
                width: 1.6em;
                height: 1.6em;
                border-radius: 50%;
                left: -0.8em;
                top: -0.8em;
                background: #ffffff;
            }
            .total-section:after {
                content: "";
                position: absolute;
                width: 1.6em;
                height: 1.6em;
                border-radius: 50%;
                right: -0.8em;
                top: -0.8em;
                background: #ffffff;
            }
            .total-label {
                font-size: 0.8em;
                padding-bottom: 0.5em;
            }
            .total-section strong {
                font-size: 1.5em;
                font-weight: 800;
            }
            .total-section small {
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="main-back">
            <div class="container m-auto bg-white p-5 bod-3">
                <div class="row">
                    <!-- CARD FORM -->
                    <div class="col-lg-8 col-md-12">
                        <form method="POST" action="{{ route("deposit.processSubmit") }}" enctype="multipart/form-data">
                            @csrf 
                            
                            <div class="header flex-between flex-vertical-center">
                                <div class="flex-vertical-center">
                                    <i class="ai-bitcoin-fill size-xl pr-sm f-main-color"></i>
                                    <span class="title"> <strong>Menually</strong><span>Pay</span> </span>
                                </div>
                            </div>
                            <div class="card-data flex-fill flex-vertical">

                                <!-- Method -->
                                <div class="flex-between">
                                    <div class="card-property-title">
                                        <strong>Payment Method</strong>
                                    </div>
                                    <div class="card-property-value">
                                        <select name="method" id="payment_method" required>
                                            <option value="">Select a payment method</option>
                                            @if (!empty($manage->deposit_bkash_number))
                                                <option selected value="Bkash" data-number="{{ $manage->deposit_bkash_number }}" data-info="{{ $manage->deposit_bkash_info }}">Bkash</option>
                                            @endif

                                            @if (!empty($manage->deposit_nagad_number))
                                                <option value="Nagad" data-number="{{ $manage->deposit_nagad_number }}" data-info="{{ $manage->deposit_nagad_info }}">Nagad</option>
                                            @endif

                                            @if (!empty($manage->deposit_rocket_number))
                                                <option value="Rocket" data-number="{{ $manage->deposit_rocket_number }}" data-info="{{ $manage->deposit_rocket_info }}">Rocket</option>
                                            @endif

                                            @if (!empty($manage->deposit_upay_number))
                                                <option value="Upay" data-number="{{ $manage->deposit_upay_number }}" data-info="{{ $manage->deposit_upay_info }}">Upay</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="flex-between">
                                    <div class="card-property-title">
                                        <strong>Our target <span id="methdo_name">Bkash</span> number</strong>
                                        <span id="method_info">{{ $manage->deposit_bkash_info }}</span>
                                    </div>
                                    <div class="card-property-value">
                                        <div class="input-container">
                                            <input type="text"  disabled value="{{ $manage->deposit_bkash_number }}" id="method_number" />
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-between">
                                    <div class="card-property-title">
                                        <strong>Payment tranction ID</strong>
                                    </div>
                                    <div class="card-property-value">
                                        <div class="input-container">
                                            <input type="text" placeholder="Tranction ID..." name="tranx_id" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-between">
                                    <div class="card-property-title">
                                        <strong>Deposit Amount</strong>
                                    </div>
                                    <div class="card-property-value">
                                        <div class="input-container">
                                            <input type="number" placeholder="Amount..." name="amount" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-between">
                                    <div class="card-property-title">
                                        <strong>Payment attachment</strong>
                                    </div>
                                    <div class="card-property-value">
                                        <div class="input-container">
                                            <input style="height: auto" type="file" name="file" required/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="action flex-center">
                                <button type="submit" class="b-main-color pointer">Confirmed</button>
                                <button type="submit" class="b-main-color pointer" style="background: red"><a style="color: white" href="{{ route('users.admin_all_web') }}">Back</a></button>
                            </div>
                        </form>
                    </div>

                    <!-- SIDEBAR -->
                    <div class="col-lg-4 col-md-12 py-5">
                        <div></div>
                        <div class="purchase-section flex-fill flex-vertical">

                            <ul class="purchase-props">
                                <li class="flex-between">
                                    <span>User Name</span>
                                    <strong>{{ $user->username }}</strong>
                                </li>
                                <li class="flex-between">
                                    <span>Available login device</span>
                                    <strong>{{ $user->login_time }}</strong>
                                </li>
                                <li class="flex-between">
                                    <span>Expired In</span>
                                    <strong>
                                        {{ !empty($user->expired_format['months']) ? $user->expired_format['months']."Mo" : "" }}
                                        {{ !empty($user->expired_format['days']) ? $user->expired_format['days']."d" : "" }}
                                        {{ !empty($user->expired_format['hours']) ? $user->expired_format['hours']."h" : "" }}
                                        {{ !empty($user->expired_format['minutes']) ? $user->expired_format['minutes']."m" : "" }}
                                    </strong>
                                </li>
                            </ul>
                        </div>
                        <div class="separation-line"></div>
                        <div class="total-section flex-between flex-vertical-center">
                            <div class="flex-fill flex-vertical">
                                <div class="total-label f-secondary-color">Your current balance</div>
                                <div>
                                    <strong>{{ $user->balance }}</strong>
                                    <small><span class="f-secondary-color">BDT</span></small>
                                </div>
                            </div>
                            <i class="ai-coin size-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("payment_method").addEventListener("change", function() {
                let selectedOption = this.options[this.selectedIndex]; // Get the selected option
                let name = this.value; // Get the selected value
                let number = selectedOption.getAttribute("data-number"); // Get the data-number attribute of the selected option
                let info = selectedOption.getAttribute("data-info"); // Get the data-info attribute of the selected option

                // Set the values to the corresponding input fields
                document.getElementById("methdo_name").innerHTML = name;
                document.getElementById("method_number").value = number;
                document.getElementById("method_info").innerHTML = info;
            });

        </script>
    </body>
</html>
