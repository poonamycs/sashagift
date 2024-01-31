<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Trustedby;
use Image;

class TrustedController extends Controller
{
    public function addTrustedby(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		$trustedby = new Trustedby;
    		$trustedby->name = $data['name'];
    		if(empty($data['status'])){
    			$status = 0;
	    	}
	    	else{
	    		$status = 1;
	    	}

    		$trustedby->status = $status;
    		if($request->hasFile('image')){

    			// $image_tmp = Input::file('image');    // not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$image_path = 'assets'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'backend_images'.DIRECTORY_SEPARATOR.'trustedby'.DIRECTORY_SEPARATOR.''.$filename;
					// $image_path = public_path('admin/images/backend_images/trustedby/' . $filename);
					// dd($image_path);
    				// Resizes image
    				Image::make($image_tmp)->fit(340, 340)->save($image_path);

    				// Store image name in products table
    				$trustedby->image = $filename;
    			}
    		}
    		$trustedby->save();
    		return redirect('admin/view-trustedby')->with('flash_message_success','Trustedby Added Successfully.');
    	}
    	return view('admin.trustedby.add_trustedby');
    }

    public function editTrustedby(Request $request, $id = null){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		if($request->hasFile('image')){
    			// $image_tmp = Input::file('image'); //not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$image_path = 'assets'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'backend_images'.DIRECTORY_SEPARATOR.'trustedby'.DIRECTORY_SEPARATOR.''.$filename;
    				Image::make($image_tmp)->resize(300,300)->save($image_path);    			
    			} 
            }else if(!empty($data['current_image'])){
    				 $filename = $data['current_image'];
                }else{
                     $filename = '';
    			} 

	    	if(empty($data['status'])){
	    		$status = 0;
	    	}else{
	    		$status = 1;
	    	}
		Trustedby::where('id',$id)->update(['name'=>$data['name'],'status'=>$status,'image'=>$filename]);
    	return redirect()->back()->with('flash_message_success','Trustedby updated Successfully.');
    	}

    	$trustedby = Trustedby::where('id',$id)->first();
    	// echo "<pre>"; print_r($testimonialDetails); die;
    	return view('admin.trustedby.edit_trustedby')->with(compact('trustedby'));
    }

    public function viewTrustedby(){
    	$trustedbyAll = Trustedby::get();
    	// echo "<pre>"; print_r($testimonialsAll); die;
    	return view('admin.trustedby.view_trustedby')->with(compact('trustedbyAll'));
    }

    public function deleteTrustedby($id = null){
    	Trustedby::where('id',$id)->delete();
    	return redirect('/admin/view-trustedby')->with('flash_message_success','Trustedby Deleted Successfully.');
    }
}
