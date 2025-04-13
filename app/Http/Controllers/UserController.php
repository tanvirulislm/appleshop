<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPMail;

class UserController extends Controller
{
    public function UserLogin(Request $request)
    {
        try {
            $UserEmail = $request->email;
            $otp = rand(1000, 9999);
            $details = ['code' => $otp];
            // dd($details);

            Mail::to($UserEmail)->send(new OTPMail($details));

            User::updateOrCreate(['email' => $UserEmail], ['email' => $UserEmail, 'otp' => $otp]);
            return ResponseHelper::Out('success', 'A 4 digit OTP has been sent to your email', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e, 200);
        }
    }
}
