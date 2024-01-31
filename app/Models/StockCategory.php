<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCategory extends Model
{
    public function stockCategories(){
    	return $this->hasMany('App\Models\StockCategory','parent_id');
    }
}
