<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function UserLogin(string $UserEmail)
    {
        try {
            $otp = rand(1000, 9999);
            $details = ['code' => $otp];

            Mail::to($UserEmail)->send(new OTPMail($details));

            User::updateOrCreate(['email' => $UserEmail], ['email' => $UserEmail, 'otp' => $otp]);
            return ResponseHelper::Out("success", "A 4 digit OTP has been sent to your {$UserEmail}", 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e, 200);
        }
    }

    public function VerifyLogin($userEmail, $otp)
    {
        $verification = User::where('email', $userEmail)->where('otp', $otp)->first();
        if ($verification) {
            User::where('email', $userEmail)->where('otp', $otp)->update(['otp' => 0]);
            $token = JWTToken::CreateToken($userEmail, $verification->id);
            return ResponseHelper::Out('success', "", 200)->cookie('token', $token, 60 * 24 * 30);
        } else {
            return ResponseHelper::Out('fail', null, 401);
        }
    }

    public function Logout()
    {
        return ResponseHelper::Out('success', null, 200)->cookie('token', '', -1);
    }
}
