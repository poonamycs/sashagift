<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Trustedby;
use App\Models\Admin;
use App\Models\VendorProduct;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\About;
use App\Models\Industry;
use App\Models\ContactDetail;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsImage;
use Session;
class IndexController extends Controller
{
    public function index()
    {
        $meta_title = config('app.name');
        $trustedby = Trustedby::where('status','=',1)->get();
        $brands = Brand::where('status','=',1)->get();
        $testimonials = Testimonial::where('status','=',1)->get();
        $categories = Category::where('status','=',1)->where('id','!=',1)->get();
        $banners = Banner::where('status','=',1)->get();
        return view('index',compact('meta_title','trustedby','brands','testimonials','categories','banners'));
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
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->mobile = $request->mobile;
        $contact->save();
        return redirect()->back()->with('success_message','We will response you shortly');
    }
    public function productenquiry(Request $request)
    {
        $enquiry = new Enquiry;
        $enquiry->product_id = $request->product_id;
        $enquiry->name = $request->name;
        $enquiry->phone = $request->phone;
        $enquiry->email = $request->email;
        $enquiry->message = $request->message;
        $enquiry->save();
        return redirect()->back()->with('flash_message_error','We will response you shortly');
    }
    public function blog()
    {
        $blogs = Blog::where('status',1)->get();
        $meta_title = config('app.name');
        return view('blog',compact('meta_title','blogs'));
    }
    public function blog_detail($id = null)
    {
        $id = decrypt($id);
        $blog = Blog::where('id',$id)->where('status',1)->first();
        $meta_title = config('app.name');
        return view('blog_detail',compact('meta_title','blog'));
    }
    public function vender_plisting(Request $request){
        $meta_title = 'Product Listing Page';
        $email = Session::get('vendorSession');
        $user = Admin::where('email',$email)->first();
        $vendorproducts = VendorProduct::where('vendor_id',$user->id)->get();
        return view('vender_listing',compact('meta_title','email','user','vendorproducts'));
    }
    public function product_list($id = null)
    {
        $id = decrypt($id);
        $products = Product::where('category_id',$id)->where('status','=',1)->where('vendor_product','=',0)->get();
        $meta_title = config('app.name');
        return view('product_list',compact('meta_title','products','id'));
    }
    public function product_detail($id = null)
    {
        $id = decrypt($id);
        $product = Product::where('id',$id)->first();
        $product_imgs = ProductsImage::where('product_id',$product->id)->get();
        $meta_title = config('app.name');
        return view('product_detail',compact('meta_title','product','product_imgs'));
    }

    public function nuhas()
    {
        $meta_title = config('app.name');
        $products = Product::where('category_id','1')->where('status','=',1)->where('vendor_product','=',0)->paginate(8);
        return view('nuhas',compact('meta_title','products'));
    }
    public function nuhas_detail($id = null)
    {
        $id = decrypt($id);
        $product = Product::where('id',$id)->first();
        $product_imgs = ProductsImage::where('product_id',$product->id)->get();
        $meta_title = config('app.name');
        return view('nuhas_detail',compact('meta_title','product','product_imgs'));
    }

    public function user_login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            $vendorCount = Admin::where(['email' => $data['email'],'password'=>md5($data['password']),'status'=>1,'admin_approved'=>1])->count(); 
            if($vendorCount > 0){
                Session::put('vendorSession', $data['email']);
                return redirect('/vender_product_listing');
            }else{
                return redirect('/user_login')->with('flash_message_error','Invalid Email or Password');
            }
        }
        $meta_title = config('app.name');
        return view('user_login',compact('meta_title'));
    }
    public function userLogout(Request $request){ 
        Session::flush();          
        return redirect('/');    
        
    }

    // public function vender_plisting()
    // {
        
    //     $meta_title = config('app.name');
    //     return view('vender_listing',compact('meta_title','vender_plisting'));
    // }


}


