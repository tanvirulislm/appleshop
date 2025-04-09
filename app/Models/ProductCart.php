<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'color',
        'size',
        'qty',
        'price'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
