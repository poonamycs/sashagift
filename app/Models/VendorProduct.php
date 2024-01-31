<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    protected $table = 'vendorproducts';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
