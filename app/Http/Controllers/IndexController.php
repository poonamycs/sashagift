<?php

namespace App\Http\Controllers;
use App\Models\Trustedby;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\About;
use App\Models\Industry;
use App\Models\ContactDetail;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsImage;
class IndexController extends Controller
{
    public function index()
    {
        $meta_title = config('app.name');
        $trustedby = Trustedby::where('status','=',1)->get();
        $brands = Brand::where('status','=',1)->get();
        $testimonials = Testimonial::where('status','=',1)->get();
        $categories = Category::where('status','=',1)->where('id','!=',1)->get();
        return view('index',compact('meta_title','trustedby','brands','testimonials','categories'));
    }


    public function about()
    {
        $about = About::first();
        $meta_title = config('app.name');
        return view('about',compact('meta_title','about'));
    }


    public function contact()
    {
        $meta_title = config('app.name');
        $contact = ContactDetail::first();
        return view('contact',compact('meta_title','contact'));
    }


    public function blog()
    {
        $blogs = Blog::where('status',1)->get();
        $meta_title = config('app.name');
        return view('blog',compact('meta_title','blogs'));
    }
    public function blog_detail()
    {
        $meta_title = config('app.name');
        return view('blog_detail',compact('meta_title'));
    }

    public function product_list($id = null)
    {
        $id = decrypt($id);
        $products = Product::where('category_id',$id)->get();
        $meta_title = config('app.name');
        return view('product_list',compact('meta_title','products'));
    }
    public function product_detail($id = null)
    {
        $id = decrypt($id);
        $product = Product::where('id',$id)->first();
        $meta_title = config('app.name');
        return view('product_detail',compact('meta_title','product'));
    }

    public function nuhas()
    {
        $meta_title = config('app.name');
        return view('nuhas',compact('meta_title'));
    }
    public function nuhas_detail($id = null)
    {
        $id = decrypt($id);
        $product = Product::where('id',$id)->first();
        $product_imgs = ProductsImage::where('product_id',$product->id)->get();
        $meta_title = config('app.name');
        return view('nuhas_detail',compact('meta_title','product','product_imgs'));
    }

    public function user_login()
    {
        $meta_title = config('app.name');
        return view('user_login',compact('meta_title'));
    }

}


