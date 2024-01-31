<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\CmsPage;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\ContactDetail;
use App\Models\Category;

class CmsController extends Controller
{
    public function addCmsPage(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$cmspage = new CmsPage;
    		$cmspage->title = $data['title'];
    		$cmspage->description = $data['description'];
    		$cmspage->url = $data['url'];

    		if(empty($data['status'])){
            	$status = 0;
            }else{
                $status = 1;
            }
            $cmspage->status = $status;
    		$cmspage->save();

    		return redirect('/admin/view-cms-pages')->with('flash_message_success','CMS Page has been added sucessfully.');
    	}

    	return view('admin.pages.add_cms_page');
    }

    public function viewCmspages(){
    	$allCmsPages = CmsPage::get();
    	return view('admin.pages.view_cms_pages')->with(compact('allCmsPages'));
    }

    public function editCmspage(Request $request, $id=null){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if(empty($data['status'])){
                $status = 0;                
            }else{
                $status = 1;  
            }
            CmsPage::where('id',$id)->update(['title'=>$data['title'],'url'=>$data['url'],'description'=>$data['description'],'status'=>$status,]);
            return redirect()->back()->with('flash_message_success','CMS Page Updated sucessfully.');
    	}

    	$CmsPage = CmsPage::where('id',$id)->first();
    	$CmsPage = json_decode(json_encode($CmsPage));
    	// echo "<pre>"; print_r($CmsPage); die;
    	return view('admin.pages.edit_cms_page')->with(compact('CmsPage'));
    }

    public function deleteCmsPage($id=null){
    	CmsPage::where(['id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','CMS Page deletd sucessfully.');
    }

    public function cmsPage($url){
    	$cmsPageCount = CmsPage::where(['url'=>$url, 'status'=>1])->count();
    	if($cmsPageCount>0){
    		$cmsPageDetails = CmsPage::where('url',$url)->first();    		
    	}else{
    		return view('404');
    	}
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
    	return view('pages.cms_page')->with(compact('cmsPageDetails','categories'));
    }

    public function contactDetails(Request $request){
        $contactDetails = ContactDetail::first();
        return view('admin.contact_details')->with(compact('contactDetails'));
    }

    public function editcontactDetails(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['address'])){
                return redirect()->back()->with('flash_message_error','Please enter address');
            }
            if(empty($data['phone'])){
                return redirect()->back()->with('flash_message_error','Please enter phone');
            }
            if(empty($data['email'])){
                return redirect()->back()->with('flash_message_error','Please enter email');
            }
            ContactDetail::where('id',$id)->update(['address'=>$data['address'],'phone'=>$data['phone'],'email'=>$data['email']]);
            return redirect()->back()->with('flash_message_success','Contact Details Updated.');
        }
    }

}
