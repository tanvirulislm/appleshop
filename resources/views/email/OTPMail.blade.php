<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your One-Time Password (OTP)</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            line-height: 1.6;
            color: #333333;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eeeeee;
            margin-bottom: 25px;
        }

        .email-header h1 {
            color: #0d6efd;
            margin: 0;
            font-size: 24px;
        }

        .email-content {
            padding: 10px 0;
            font-size: 16px;
        }

        .email-content p {
            margin: 0 0 1em 0;
        }

        .otp-code {
            display: inline-block;
            font-size: 28px;
            font-weight: bold;
            color: #dc3545;
            background-color: #f8d7da;
            padding: 12px 25px;
            border-radius: 5px;
            letter-spacing: 3px;
            margin: 20px 0;
            border: 1px dashed #dc3545;
        }

        .text-center {
            text-align: center;
        }

        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
            margin-top: 25px;
            font-size: 12px;
            color: #777777;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 15px 0;
            background-color: #0d6efd;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a {
            color: #0d6efd;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">

            <h1>My Application</h1>
        </div>

        <div class="email-content">

            <p>Hello userName,</p>

            <p>Hello,</p>

            <p>Here is your One-Time Password (OTP) for your recent request. Please use this code to complete your
                action:</p>

            <p class="text-center">
                <span class="otp-code">{{ $details['code'] }}</span>
            </p>


            <p>Please note: This code is valid for the next <strong>2 minutes</strong>.</p>


            <p>If you did not request this code, please ignore this email or contact our support team immediately if you
                suspect unauthorized activity.</p>



            <p>Thank you,<br>
                The My Application Team</p>
        </div>

        <div class="email-footer">
            <p>&copy; 12/15/14 My Application. All rights reserved.</p>

            <p>You are receiving this email because an action requiring verification was initiated on your account.</p>
        </div>
    </div>
</body>

</html>