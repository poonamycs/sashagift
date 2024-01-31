<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
date_default_timezone_set('Asia/Kolkata');

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $adminCount = Admin::where(['email' => $data['email'],'password'=>md5($data['password']),'status'=>1,'admin_approved'=>1])->count(); 
            if($adminCount > 0){
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        $orders = Order::with('orders')->orderBy('id','DESC')->take(10)->get();        
        $vendors = Admin::where('vname','<>','Superadmin')->get();
        if(Session::has('adminSession')){
           return view('admin.dashboard')->with(compact('orders','vendors'));
        }else{
           return redirect('/admin')->with('flash_message_error','Please login to access');
        }
        return view('admin.dashboard')->with(compact('orders'));
    }

    public function settings(){
        $adminDetails = Admin::where(['email'=>Session::get('adminSession')])->first();
        // echo "<pre>"; print_r($adminDetails); die;
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $adminCount = Admin::where(['email' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count(); 
        if($adminCount == 1){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $adminCount = Admin::where(['email' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();

            if($adminCount == 1){
                $password = md5($data['new_pwd']);
                Admin::where('email',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');
    }

    public function addVendor(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $vendorCount = Admin::where('email',$data['email'])->count();
            if($vendorCount>0){
                return redirect()->back()->with('flash_message_error','Email already exists, use another email.');
            }else{
                $vendor = new Admin;
                $vendor->email = $data['email'];
                $vendor->password = md5($data['password']);
                $vendor->vname = $data['vname'];
                $vendor->vphone = $data['vphone'];
                $vendor->vaddress = $data['vaddress'];
                $vendor->vpincode = $data['vpincode'];
                $vendor->status = $data['status'];
                $vendor->admin_approved = $data['admin_approved'];
                $vendor->created_at = date('Y-m-d H:i:s');
                $vendor->updated_at = date('Y-m-d H:i:s');
                $vendor->save();

                return redirect()->back()->with('flash_message_success','Vendor registration form submitted successfully.');
            }
        }
        return view('admin.users.add_vendor');
    }

    public function vendorRegisterForm(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $vendorCount = Admin::where('email',$data['email'])->count();
            if($vendorCount>0){
                return redirect()->back()->with('flash_message_error','Email already exists, use another email.');
            }else{
                $vendor = new Admin;
                $vendor->email = $data['email'];
                $vendor->password = md5($data['password']);
                $vendor->vname = $data['vname'];
                $vendor->vphone = $data['vphone'];
                $vendor->vaddress = $data['vaddress'];
                $vendor->vpincode = $data['vpincode'];
                $vendor->status = $data['status'];
                $vendor->admin_approved = $data['admin_approved'];
                date_default_timezone_set('Asia/Kolkata');
                $vendor->created_at = date('Y-m-d H:i:s');
                $vendor->updated_at = date('Y-m-d H:i:s');
                $vendor->save();

                //send vendor email confirmation
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'vname'=>$data['vname'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirm_vendor_email',$messageData,function($message) use($email){
                    $message->to($email)->subject('Verify Email - Veggi Mart');
                });

                return redirect()->back()->with('flash_message_success','Vendor registration form submitted successfully.');
            }
        }
    }

    public function viewVendors(Request $request){
        $vendors = Admin::where('admin','<>',1)->get();
        // echo "<pre>"; print_r($vendors); die;
        return view('admin.users.view_vendors')->with(compact('vendors'));
    }

    public function confirmVendorAccount($email){
        $email = base64_decode($email);
        $vendorCount = Admin::where('email',$email)->count();
        if($userCount > 0){
            $vendorDetails = Admin::where('email',$email)->first();
            if($vendorDetails->status == 1){
                return redirect('vendor-register')->with('flash_message_success','Your Email account is already activated. You can login now.');
            }else{
                Admin::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = ['email'=>$email,'vname'=>$vendorDetails->vname];
                Mail::send('emails.vendor_welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to Veggi Mart');
                });

                return redirect('vendor-register')->with('flash_message_success','Your Email account is confirmed. You can login after admin approves your request.');
            }
        }else{
            abort(404);
        }
    }

    public function updateStatus(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['admin_approved'])){
                $admin_approved='0';
            }else{
                $admin_approved='1';
            }

            Admin::where('id',$id)->update(['admin_approved'=>$admin_approved]);
            return redirect()->back()->with('flash_message_success','vendor account updated successfully.');
        }
    }

    public function stats(Request $request){
        $pcount = Product::count();
        return view('admin.dashboard')->with(['total'=>$pcount]);
    }

    public function viewSearchHistory(Request $request){
        $searchDetails = Search::orderBy('created_at')->get();
        // dd($searchDetails);
        return view('admin.users.view_search_history')->with(compact('searchDetails'));
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $adminCount = Admin::where('email',$data['email'])->count();
            if($adminCount==0){
                return redirect()->back()->with('flash_message_error','We can not find a user with this email address.');
            }

            $adminDetails = Admin::where('email',$data['email'])->first();
            $random_password = Str::random(8);
            $new_password = md5($random_password);

            Admin::where('email',$data['email'])->update(['password'=>$new_password]);

            $email = $data['email'];
            $name = $adminDetails->name;
            $messageData = [
                'email'=>$email,
                'password'=>$random_password
            ];
            Mail::send('emails.adminforgotpassword',$messageData,function($message) use($email){
                $message->to($email)->subject('New Password - Veggi Mart');
            });
            return redirect()->back()->with('flash_message_success','Password sent on your email, kindly check your Email.');
        }
    }

}
