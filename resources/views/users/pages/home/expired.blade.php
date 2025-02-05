<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Deposit Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(45deg, #dc2a2a, #ff8e8e);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .form-container {
            background: #DC2A2A;
            border-radius: 16px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            padding: 40px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 20px;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #2d3436;
            font-size: 32px;
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .input-group {
            margin-bottom: 24px;
            text-align: left;
        }

        .input-group label {
            font-size: 15px;
            color: #636e72;
            margin-bottom: 10px;
            font-weight: 600;
            display: block;
            padding-left: 5px;
        }

        .input-group input,
        .input-group select,
        .input-group input[type="file"] {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 15px;
            margin-bottom: 12px;
            outline: none;
            background: #f8f9fa;
            transition: all 0.3s ease;
            color: #2d3436;
        }

        .input-group input:focus,
        .input-group select:focus,
        .input-group input[type="file"]:focus {
            border-color: #dc2a2a;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(220, 42, 42, 0.1);
        }

        .box {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #f1f3f5;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #dc2a2a, #c22525);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #c22525, #a81f1f);
            transform: translateY(-2px);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .payment-info {
            font-size: 15px;
            margin: 25px 0;
            font-weight: 500;
            color: #2d3436;
            background: #fff9f9;
            padding: 18px;
            border-radius: 8px;
            border-left: 4px solid #dc2a2a;
        }

        #tutorialBtn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #dc2a2a, #c22525);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        #tutorialBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 42, 42, 0.25);
        }

        /* Modern Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            padding-top: 60px;
        }

        .modal-content {
            background: #ffffff;
            margin: 5% auto;
            padding: 30px;
            border-radius: 16px;
            width: 85%;
            max-width: 700px;
            position: relative;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #636e72;
            position: absolute;
            right: 25px;
            top: 15px;
            font-size: 32px;
            font-weight: 300;
            transition: all 0.3s ease;
        }

        .close:hover,
        .close:focus {
            color: #dc2a2a;
            transform: scale(1.1);
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 25px;
                margin: 15px;
            }

            h2 {
                font-size: 26px;
            }

            .modal-content {
                padding: 20px;
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="box">
            <button id="tutorialBtn">How To Buy Package</button>

            <form action="{{ route("processSubmitUser") }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="input-group">
                    <label for="package">Select a package of your choice:</label>
                    <select id="package" name="package" required>
                        <option value="">Select a package</option>
                        @foreach ($packages as $item)
                            <option value="{{ $item->id }}" data-amount="{{ $item->amount }}">{{ $item->validity }} Days - {{ $item->amount }}৳</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="payment-method">Select a payment method of your choice:</label>
                    <select id="payment-method" name="method" required>
                        @if (!empty($creator->deposit_bkash_number))
                            <option value="bkash" data-info="{{ $creator->deposit_bkash_info }}" data-number="{{ $creator->deposit_bkash_number }}">BKash</option>
                        @endif
                        @if (!empty($creator->deposit_nagad_number))
                            <option value="nagad" data-info="{{ $creator->deposit_nagad_info }}" data-number="{{ $creator->deposit_nagad_number }}">Nagad</option>
                        @endif
                        @if (!empty($creator->deposit_rocket_number))
                            <option value="rocket" data-info="{{ $creator->deposit_rocket_info }}" data-number="{{ $creator->deposit_rocket_number }}">Rocket</option>
                        @endif
                        @if (!empty($creator->deposit_upay_number))
                            <option value="upay" data-info="{{ $creator->deposit_upay_info }}" data-number="{{ $creator->deposit_upay_number }}">Upay</option>
                        @endif
                    </select>
                </div>

                <div id="payment-info" class="payment-info">
                    <label id="payment-info-label"></label>
                </div>

                <div class="input-group">
                    <label for="transaction-id">Enter the Payment Transaction ID:</label>
                    <input type="text" id="transaction-id" name="tranx_id" placeholder="Transaction ID" required>
                </div>

                <div class="input-group">
                    <label for="screenshot">Upload Screenshot of Payment:</label>
                    <input type="file" id="screenshot" name="file" accept="image/*" required>
                </div>

                <div class="input-group">
                    <button type="submit" class="submit-btn">Submit Deposit</button>
                </div>
            </form>
        </div>
    </div>

    <div id="tutorialModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>How to Buy Package</h2>
            <iframe id="ytVideo" width="100%" height="400" src="https://www.youtube.com/embed/YiAB7z4aym0" style="border-radius: 12px;" allowfullscreen></iframe>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            const depositInfo = () => {
                let selectedMethod = $("#payment-method option:selected");
                let selectedPackage = $("#package option:selected");
                
                let info = selectedMethod.attr("data-info");
                let number = selectedMethod.attr("data-number");
                let method = selectedMethod.val();
                let price = selectedPackage.attr("data-amount");

                // check the method 
                if(method == ""){
                    $("#payment-info-label").html("");
                    return;
                }

                $("#payment-info-label").html(`
                    ${info} <strong> ${price}৳ </strong> to <strong style="text-transform: uppercase;">${method}</strong> Number: 
                    <strong style="color: #dc2a2a">${number}</strong>
                `);
            }
            $("#package, #payment-method").change(function(){
                depositInfo();
            });

            // Video Control
            const modal = document.getElementById("tutorialModal");
            const btn = document.getElementById("tutorialBtn");
            const span = document.getElementsByClassName("close")[0];
            const iframe = document.getElementById('ytVideo');
            const originalSrc = iframe.src;

            function stopVideo() {
                iframe.src = '';
            }

            function playVideo() {
                iframe.src = originalSrc;
            }

            btn.onclick = () => {
                modal.style.display = "block";
                playVideo();
            };

            span.onclick = () => {
                modal.style.display = "none";
                stopVideo();
            };

            window.onclick = (event) => {
                if (event.target == modal) {
                    modal.style.display = "none";
                    stopVideo();
                }
            };
        });
    </script>
</body>
</html>