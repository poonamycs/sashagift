<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Cart;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Exports\usersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use carbon\carbon;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Order;

class UsersController extends Controller
{
    
    public function userLoginRegister(Request $request){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('users.login_register')->with(compact('categories'));
    }

    public function register(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$userCount = User::where('email',$data['email'])->count();
    		if($userCount>0){
    			return redirect('login-register/')->with('flash_message_error','Email already exists in our system, please use another valid email.'); 
    		}else{
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->mobile = $data['mobile'];
                $user->pincode = $data['pincode'];
                $user->password = bcrypt($data['password']);
                date_default_timezone_set('Asia/Kolkata');
                $user->created_at = date('Y-m-d H:i:s');
                $user->updated_at = date('Y-m-d H:i:s');
                $user->save();

                //send register email
                // $email = $data['email'];
                // $messageData = ['email'=>$data['email'],'name'=>$data['name']];
                // Mail::send('emails.register',$messageData,function($message) use($email){
                //     $message->to($email)->subject('Registration with Grocery Shop');
                // });

                //send confirmation mail
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                    $message->to($email)->subject('Verify Email - Veggimart');
                });

                return redirect('login-register/')->with('flash_message_success','Please confirm your email to activate your account. check your inbox.'); 

                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    Session::put('frontSession',$data['email']);

                if(!empty(Session::get('session_id'))){
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email'=>$data['email']]);
                }
                    return redirect('/cart');
                }
            }
    	}
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your account is disabled, To activate please verify your email.');
                }
                Session::put('frontSession',$data['email']);

                if(!empty(Session::get('session_id'))){
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email'=>$data['email']]);
                }                 
                return redirect('/account');
            }else{
                return redirect('login-register/')->with('flash_message_error','Invalid username or password.');
            }
        }
    }

    public function account(Request $request){
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        // echo "<pre>"; print_r($userDetails); die;
        $countries = Country::get();

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','Please enter your name to update account details.');
            }

            if(empty($data['address'])){
                $data['address'] = '';
            }

            if(empty($data['state'])){
                $data['state'] = '';
            }

            if(empty($data['country'])){
                $data['country'] = '';
            }

            if(empty($data['pincode'])){
                $data['pincode'] = '';
            }

            if(empty($data['mobile'])){
                $data['mobile'] = '';
            }

            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Account Details Updated Successfully.');
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('users.account')->with(compact('countries','userDetails','categories'));
    }

    public function chkUserPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $old_pwd = User::where('id',Auth::User()->id)->first();
            $current_pwd = $data['current_pwd'];
            if(Hash::check($current_pwd,$old_pwd->password)){
                // Update password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('flash_message_success','Password updated successfully!');
            }else{
                return redirect()->back()->with('flash_message_error','Current Password is incorrect!');
            }
        }
    }

    public function logout(){
        Auth::logout();
        // Session::flush();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/login-register/')->with('flash_message_success','You have been logged out.');
    }

    public function checkEmail(Request $request){
        $data = $request->all();
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
            echo "false";
        } else{
            echo "true"; die;
        }
    }

    public function viewUsers(){
        $users = User::orderBy('id','DESC')->get();
        // echo "<pre>"; print_r($users); die;
        return view('admin.users.view_users')->with(compact('users'));
    }

    public function confirmAccount($email){
        $email = base64_decode($email);
        $userCount = User::where('email',$email)->count();
        if($userCount > 0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login-register')->with('flash_message_success','Your Email account is already activated. You can login now.');
            }else{
                User::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = ['email'=>$email,'name'=>$userDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to Veggimart');
                });

                return redirect('login-register')->with('flash_message_success','Your veggimart account is activated. You can login now.');
            }
        }else{
            abort(404);
        }
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $userCount = User::where('email',$data['email'])->count();
            if($userCount==0){
                return redirect()->back()->with('flash_message_error','We can not find a user with that Email address.');
            }

            //get User Details
            $userDetails = User::where('email',$data['email'])->first();
            //generate random password
            $random_password = Str::random(8);
            $new_password = bcrypt($random_password);

            //update pwd
            User::where('email',$data['email'])->update(['password'=>$new_password]);

            //send forgot email password email code
            $email = $data['email'];
            $name = $userDetails->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgotpassword',$messageData,function($message) use($email){
                $message->to($email)->subject('New Password - Veggimart');
            });

            return redirect()->back()->with('flash_message_success','Password sent on your email, kindly check your Email.');
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('users.forgot_password')->with(compact('categories'));
    }

    public function viewUserscharts(){
        $current_month_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count();
        $last_month_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
        $last_to_last_month_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count();
        return view('admin.users.view_users_charts')->with(compact('current_month_users','last_month_users','last_to_last_month_users'));
    }

    public function exportUsers(){
        return Excel::download(new usersExport,'Customers-details.xlsx');
    }

    public function viewEnquiries(){
        $allEnquiries = Contact::orderBy('id','DESC')->get();
        return view('admin.users.view_enquiries')->with(compact('allEnquiries'));
    }

    public function deleteEnquiry($id){
        Contact::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Enquiry deleted.');
    }

    

    public function passwordSetting(Request $request){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('users.password_setting')->with(compact('categories'));
    }

    public function viewUserOrders(Request $request, $email){
        $orders = Order::where('user_email',$email)->get();
        // dd($orderDetails);
        return view('admin.users.view_user_orders')->with(compact('orders'));
    }

}
