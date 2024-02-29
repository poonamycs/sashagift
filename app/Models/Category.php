<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    public function categories(){
    	return $this->hasMany('App\Models\Category','parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
