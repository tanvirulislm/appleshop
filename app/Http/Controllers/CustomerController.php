<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;

class CustomerController extends Controller
{
    public function CreateProfile(Request $request)
    {
        $user_id = $request->header('id');

        $request->merge([
            'user_id' => $user_id
        ]);

        $data = Customer::updateOrCreate(
            ['user_id' => $user_id],
            $request->input()
        );
        return ResponseHelper::Out('success', $data, 200);
    }

    public function ReadProfile(Request $request)
    {
        $user_id = $request->header('id');
        $data = Customer::where('user_id', $user_id)->first();
        return ResponseHelper::Out('success', $data, 200);
    }
}
