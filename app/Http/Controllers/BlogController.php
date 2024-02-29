<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Blog;
use Image;

class BlogController extends Controller
{
    public function addBlog(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		$blog = new Blog;
    		$blog->name = $data['name'];
            $blog->content = $data['content'];

    		if(empty($data['status'])){
    			$status = 0;
	    	}
	    	else{
	    		$status = 1;
	    	}

    		$blog->status = $status;
    		if($request->hasFile('image')){

    			// $image_tmp = Input::file('image');    // not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$image_path = 'assets'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'backend_images'.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.''.$filename;

    				// Resizes image
    				Image::make($image_tmp)->resize(300,300)->save($image_path);

    				// Store image name in products table
    				$blog->image = $filename;
    			}
    		}
    		$blog->save();
    		return redirect('admin/view-blogs')->with('flash_message_success','Blogs Added Successfully.');
    	}
    	return view('admin.blog.add_blog');
    }

    public function editBlog(Request $request, $id = null){
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
    				$image_path = 'assets'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'backend_images'.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.''.$filename;
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
		Blog::where('id',$id)->update(['name'=>$data['name'],'content'=>$data['content'],'status'=>$status,'image'=>$filename]);
    	return redirect()->back()->with('flash_message_success','Blog updated Successfully.');
    	}

    	$blog = Blog::where('id',$id)->first();
    	// echo "<pre>"; print_r($testimonialDetails); die;
    	return view('admin.blog.edit_blog')->with(compact('blog'));
    }

    public function viewBlog(){
    	$blogAll = Blog::get();
    	// echo "<pre>"; print_r($testimonialsAll); die;
    	return view('admin.blog.view_blogs')->with(compact('blogAll'));
    }

    public function deleteBlog($id = null){
    	Blog::where('id',$id)->delete();
    	return redirect('/admin/view-blogs')->with('flash_message_success','Blog Deleted Successfully.');
    }
}
