{{-- resources/views/emails/OTPMail.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your One-Time Password (OTP)</title>
    <style>
        /* Basic styling for better presentation in email clients */
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
            /* Example brand color - adjust as needed */
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
            /* Changed for better centering */
            font-size: 28px;
            font-weight: bold;
            color: #dc3545;
            /* Example OTP color - adjust as needed */
            background-color: #f8d7da;
            /* Light background for OTP */
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
            /* Optional button style if needed */
            display: inline-block;
            padding: 10px 20px;
            margin: 15px 0;
            background-color: #0d6efd;
            color: #ffffff !important;
            /* Important needed for some clients */
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
            {{-- You can replace this with your application's logo or name --}}
            {{-- <img src="your-logo-url.png" alt="{{ config('app.name', 'Your Application') }} Logo" height="50"> --}}
            <h1>{{ config('app.name', 'Your Application') }}</h1>
        </div>

        <div class="email-content">
            {{-- Optional: Personalize the greeting if $userName is passed --}}
            @isset($userName)
                <p>Hello {{ $userName }},</p>
            @else
                <p>Hello,</p>
            @endisset

            <p>Here is your One-Time Password (OTP) for your recent request. Please use this code to complete your
                action:</p>

            <p class="text-center">
                <span class="otp-code">{{ $otp }}</span>
            </p>

            {{-- Optional: Add expiration information if $expiresInMinutes is passed --}}
            @isset($expiresInMinutes)
                <p>Please note: This code is valid for the next <strong>{{ $expiresInMinutes }} minutes</strong>.</p>
            @endisset

            <p>If you did not request this code, please ignore this email or contact our support team immediately if you
                suspect unauthorized activity.</p>

            {{-- Optional: Add a link back to your application or support page --}}
            {{--
            <p class="text-center">
                <a href="{{ url('/support') }}" class="button">Contact Support</a>
            </p>
            --}}

            <p>Thank you,<br>
                The {{ config('app.name', 'Your Application') }} Team</p>
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Your Application') }}. All rights reserved.</p>
            {{-- Optional: Add address or contact info --}}
            {{-- <p>Your Company Address | <a href="mailto:support@yourapp.com">support@yourapp.com</a></p> --}}
            <p>You are receiving this email because an action requiring verification was initiated on your account.</p>
        </div>
    </div>
</body>

</html>