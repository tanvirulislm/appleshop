<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandList()
    {
        $data = Brand::all();
        return ResponseHelper::Out('success', $data, 200);
    }
}
