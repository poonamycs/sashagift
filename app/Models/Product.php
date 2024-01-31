<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;
use App\Models\shippingCharge;

class Product extends Model
{
    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute','product_id');
    }

    public static function cartCount(){
        if(Auth::check()){ 
            // User is logged in; we will use auth
            $user_email = Auth::user()->email;
            $cartCount = DB::table('cart')->where('user_email',$user_email)->sum('quantity');
        }else{
            // User is not logged in; we will use session
            $session_id = Session::get('session_id');
            $cartCount = DB::table('cart')->where('session_id',$session_id)->sum('quantity');
        }
        return $cartCount;
    }

    public static function productCount($cat_id){
        $catCount = Product::where(['category_id'=>$cat_id,'status'=>1])->count();
        return $catCount;
    }
    
    public static function wishlistCount(){
        if(Auth::check()){ 
            $user_email = Auth::user()->email;
            $wishlistCount = DB::table('wish_list')->where('user_email',$user_email)->sum('quantity');
        }else{
            $wishlistCount = '0';
        }
        return $wishlistCount;
    }

    public static function getShippingCharges($pincode){
        $shippingDetails = shippingCharge::where('pincode',$pincode)->first();
        $shipping_charges = $shippingDetails->shipping_charges;
        return $shipping_charges;
    }

}
