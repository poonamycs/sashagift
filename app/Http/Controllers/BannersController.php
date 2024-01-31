<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Models\Banner;
use App\Models\OfferBanner;
use Auth;
use Session;
use Image;

class BannersController extends Controller
{
    public function addBanner(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$banner = new Banner;
    		$banner->title = $data['title'];

    		if(empty($data['link'])){
    			$status = '#';
    		}else{
    			$status = $data['link'];
    		}

            if(empty($data['status'])){
                $status = '0';
            }else{
                $status = '1';
            }

    		// Upload banner image
    		if($request->hasFile('image')){

    			// $image_tmp = Input::file('image'); //not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time(). '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$banner_path = 'images/frontend_images/banners/'.$filename;

    				// Resizes image
    				Image::make($image_tmp)->resize(1350,400)->save($banner_path);

    				// Store image name in banner table
    				$banner->image = $filename;
    			}
    		}

    		$banner->status = $status;
            $banner->save();
    		return redirect()->back()->with('flash_message_success','Banner has been Added Successfully');  
    	}
    	return view('admin.banners.add_banner');
    }

    public function editBanner(Request $request, $eid){
        $id = Crypt::decrypt($eid);
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            if(empty($data['link'])){
                $data['link']='';
            }

            if(empty($data['title'])){
                $data['title']='';
            }

            // Upload Product image
    		if($request->hasFile('image')){

    			// $image_tmp = Input::file('image'); //not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$banner_path = 'images/frontend_images/banners/'.$filename;

    				// Resizes image
    				Image::make($image_tmp)->resize(1350,400)->save($banner_path);
                }
            }else if(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
                $filename = '';
            }

            Banner::where('id',$id)->update(['status'=>$status,'title'=>$data['title'],'link'=>$data['link'],'image'=>$filename]);
            return redirect()->back()->with('flash_message_success','Banner updated Successfully.');
    	}
    	$bannerDetails = Banner::where(['id'=>$id])->first();
    	return view('admin.banners.edit_banner')->with(compact('bannerDetails'));
    }

    public function deleteBanner(Request $request, $eid){
        $id = Crypt::decrypt($eid);
    	Banner::where(['id'=>$id])->delete();
    	return redirect('/admin/view-banners/')->with('flash_message_success','Banner Deleted Successfully.');
    }

    public function viewBanners(Request $request){
    	$banners = Banner::orderBy('id','DESC')->get();
    	return view('admin.banners.view_banners')->with(compact('banners'));
    }

    public function addOfferBanner(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $banner = new OfferBanner;
            $banner->title = $data['title'];
            if(!empty($data['link'])){
                $banner->link = $data['link'];
            }else{                
                $banner->link = '#';
            }

            if(empty($data['status'])){
                $status = '0';
            }else{
                $status = '1';
            }

            // Upload banner image
            if($request->hasFile('image')){
                $image_tmp = $request->image;           // so used this
                $filename = time(). '.'.$image_tmp->clientExtension(); //so used this 

                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$filename;

                    // Resizes image
                    Image::make($image_tmp)->save($banner_path);

                    // Store image name in banner table
                    $banner->image = $filename;
                }
            }

            $banner->status = $status;
            $banner->save();
            return redirect('admin/view-offer-banners/')->with('flash_message_success','Banner has been Added Successfully');  
        }
        return view('admin.banners.add_Offer_banner');
    }

    public function editOfferBanner(Request $request, $eid){
        $id = Crypt::decrypt($eid);
        if($request->isMethod('post')){
            $data = $request->all();
            
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            if(empty($data['link'])){
                $data['link']='#';
            }

            if(empty($data['title'])){
                $data['title']='';
            }

            // Upload Product image
            if($request->hasFile('image')){
                $image_tmp = $request->image;           // so used this
                $filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$filename;

                    // Resizes image
                    Image::make($image_tmp)->save($banner_path);
                }
            }else if(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
                $filename = '';
            }

            OfferBanner::where('id',$id)->update(['status'=>$status,'title'=>$data['title'],'link'=>$data['link'],'image'=>$filename]);
            return redirect()->back()->with('flash_message_success','Offer banner updated successfully.');
        }
        $bannerDetails = OfferBanner::where(['id'=>$id])->first();
        return view('admin.banners.edit_offer_banner')->with(compact('bannerDetails'));
    }

    public function viewOfferBanners(Request $request){
        $banners = OfferBanner::orderBy('id','DESC')->get();
        return view('admin.banners.view_offer_banners')->with(compact('banners'));
    }

    public function deleteOfferBanner(Request $request, $eid){
        $id = Crypt::decrypt($eid);
        OfferBanner::where(['id'=>$id])->delete();
        return redirect('/admin/view-offer-banners/')->with('flash_message_success','Banner Deleted Successfully.');
    }

}
