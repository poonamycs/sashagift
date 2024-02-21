<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiries';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
