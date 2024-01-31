<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function addBrand(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		$trustedby = new Brand;
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
    				$image_path = 'assets'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'backend_images'.DIRECTORY_SEPARATOR.'brand'.DIRECTORY_SEPARATOR.''.$filename;
					
    				// Resizes image
    				Image::make($image_tmp)->fit(340, 340)->save($image_path);

    				// Store image name in products table
    				$trustedby->image = $filename;
    			}
    		}
    		$trustedby->save();
    		return redirect('admin/view-brands')->with('flash_message_success','Brands Added Successfully.');
    	}
    	return view('admin.brand.add_brand');
    }

    public function editBrand(Request $request, $id = null){
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
    				$image_path = 'assets'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'backend_images'.DIRECTORY_SEPARATOR.'brand'.DIRECTORY_SEPARATOR.''.$filename;
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
		Brand::where('id',$id)->update(['name'=>$data['name'],'status'=>$status,'image'=>$filename]);
    	return redirect()->back()->with('flash_message_success','Brand updated Successfully.');
    	}

    	$brand = Brand::where('id',$id)->first();
    	// echo "<pre>"; print_r($testimonialDetails); die;
    	return view('admin.brand.edit_brand')->with(compact('brand'));
    }

    public function viewBrand(){
    	$brandAll = Brand::get();
    	// echo "<pre>"; print_r($testimonialsAll); die;
    	return view('admin.brand.view_brand')->with(compact('brandAll'));
    }

    public function deleteBrand($id = null){
    	Brand::where('id',$id)->delete();
    	return redirect('/admin/view-brands')->with('flash_message_success','Brand Deleted Successfully.');
    }
}
