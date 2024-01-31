<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Testimonial;
use Image;

class TestimonialsController extends Controller
{
    public function addTestimonial(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		$testimonial = new Testimonial;
    		$testimonial->name = $data['name'];
            $testimonial->content = $data['content'];

    		if(empty($data['status'])){
    			$status = 0;
	    	}
	    	else{
	    		$status = 1;
	    	}

    		$testimonial->status = $status;

	    	if(empty($data['position'])){
				$data['position'] = '';
			}else{
    			$testimonial->position = $data['position'];
    		}

    		if($request->hasFile('image')){

    			// $image_tmp = Input::file('image');    // not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$image_path = 'images/backend_images/testimonials/'.$filename;

    				// Resizes image
    				Image::make($image_tmp)->resize(300,300)->save($image_path);

    				// Store image name in products table
    				$testimonial->image = $filename;
    			}
    		}
    		$testimonial->save();
    		return redirect('admin/view-testimonials')->with('flash_message_success','Testimonial Added Successfully.');
    	}
    	return view('admin.testimonial.add_testimonial');
    }

    public function editTestimonial(Request $request, $id = null){
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
    				$image_path = 'images/backend_images/testimonials/'.$filename;
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

	    	if(empty($data['position'])){
				$data['position'] = '';
			}

		Testimonial::where('id',$id)->update(['name'=>$data['name'],'content'=>$data['content'],'status'=>$status,'image'=>$filename]);
    	return redirect()->back()->with('flash_message_success','Testimonial updated Successfully.');
    	}

    	$testimonialDetails = Testimonial::where('id',$id)->first();
    	// echo "<pre>"; print_r($testimonialDetails); die;
    	return view('admin.testimonial.edit_testimonial')->with(compact('testimonialDetails'));
    }

    public function viewTestimonials(){
    	$testimonialsAll = Testimonial::get();
    	// echo "<pre>"; print_r($testimonialsAll); die;
    	return view('admin.testimonial.view_testimonials')->with(compact('testimonialsAll'));
    }

    public function deleteTestimonial($id = null){
    	Testimonial::where('id',$id)->delete();
    	return redirect('/admin/view-testimonials')->with('flash_message_success','Testimonial Deleted Successfully.');
    }
}
