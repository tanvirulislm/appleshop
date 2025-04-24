<?php

namespace App\Helper;

use Exception;
use App\Models\Invoice;
use App\Models\SslcommerzAccount;
use Illuminate\Support\Facades\Http;

class SSLCommerz
{

    public static function InitiatePayment($profile, $payable, $tran_id, $user_email)
    {
        try {
            $ssl = SslcommerzAccount::first();

            $response = Http::asForm()->post($ssl->init_url, [
                'store_id' => $ssl->store_id,
                'store_passwd' => $ssl->store_passwd,
                'total_amount' => $payable,
                'currency' => 'BDT',
                'tran_id' => $tran_id,
                'success_url' => "$ssl->success_url?tran_id=$tran_id",
                'fail_url' => "$ssl->fail_url?tran_id=$tran_id",
                'cancel_url' => "$ssl->cancel_url?tran_id=$tran_id",
                'ipn_url' => $ssl->ipn_url,
                'cus_name' => $profile->cus_name,
                'cus_email' => $user_email,
                'cus_add1' => $profile->cus_add,
                'cus_add2' => $profile->cus_add,
                'cus_city' => $profile->cus_city,
                'cus_state' => $profile->cus_city,
                'cus_postcode' => '1200',
                'cus_country' => $profile->cus_country,
                'cus_phone' => $profile->phone,
                'cus_fax' => $profile->cus_phone,
                'shipping_method' => 'YES',
                'ship_name' => $profile->ship_name,
                'ship_add1' => $profile->ship_add,
                'ship_add2' => $profile->ship_add,
                'ship_city' => $profile->ship_city,
                'ship_state' => $profile->ship_city,
                'ship_postcode' => '1200',
                'product_name' => 'Apple Shop Product',
                'product_category' => 'Apple Shop Category',
                'product_profile' => 'Apple Shop Profile',
                'product_amount' => $payable,

            ]);

            return $response->json('desc');
        } catch (Exception $e) {
            return $ssl;
        }
    }

    public static function InitiateFail($tran_id)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => 'Fail']);
        return 1;
    }

    public static function InitiateSuccess($tran_id)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => 'Success']);
        return 1;
    }

    public static function InitiateCancel($tran_id)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => 'Cancel']);
        return 1;
    }


    public static function InitiateIPN($tran_id, $status, $val_id)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => $status, 'val_id' => $val_id]);
        return 1;
    }
}
