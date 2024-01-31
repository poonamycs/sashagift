<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\ContactDetail;
class IndexController extends Controller
{
    public function index()
    {
        $meta_title = config('app.name');
        return view('index',compact('meta_title'));
    }


    public function about()
    {
        $meta_title = config('app.name');
        return view('about',compact('meta_title'));
    }


    public function contact()
    {
        $meta_title = config('app.name');
        $contact = ContactDetail::first();
        return view('contact',compact('meta_title','contact'));
    }


    public function blog()
    {
        $meta_title = config('app.name');
        return view('blog',compact('meta_title'));
    }
    public function blog_detail()
    {
        $meta_title = config('app.name');
        return view('blog_detail',compact('meta_title'));
    }

    public function product_list()
    {
        $meta_title = config('app.name');
        return view('product_list',compact('meta_title'));
    }
    public function product_detail()
    {
        $meta_title = config('app.name');
        return view('product_detail',compact('meta_title'));
    }

    public function nuhas()
    {
        $meta_title = config('app.name');
        return view('nuhas',compact('meta_title'));
    }
    public function nuhas_detail()
    {
        $meta_title = config('app.name');
        return view('nuhas_detail',compact('meta_title'));
    }

    public function user_login()
    {
        $meta_title = config('app.name');
        return view('user_login',compact('meta_title'));
    }

}


