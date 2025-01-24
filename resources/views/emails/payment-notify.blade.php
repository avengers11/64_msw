<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 20px 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px 30px;
        }
        .content p {
            margin: 15px 0;
        }
        .content strong {
            color: #4CAF50;
        }
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px 20px;
            font-size: 14px;
            color: #666;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <h1>{{ $details['title'] }}</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Username: <strong>{{ $details['username'] }}</strong></p>
            <p>Amount: <strong>{{ $details['amount'] }}</p>
            <p>Method: <strong>{{ $details['method'] }}</p>
            <p>Tranction ID: <strong>{{ $details['tranx_id'] }}</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>If you have any questions, feel free to <a href="support@ott-app.com">contact us</a>.</p>
            <p>&copy; {{ date('Y') }} Your {{ env('APP_NAME') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
