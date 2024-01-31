<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Session;
use Image;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            // $category->description = $data['description'];
            $tempURL = strtolower($data['category_name']);
            $url = str_replace(' ', '-', $tempURL);
            $category->url = $url;

            // Upload category image
            if($request->hasFile('image')){
                $image_tmp = $request->image;                     
                $filename = time().'.'.$image_tmp->clientExtension(); 

                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $image_path = 'images/frontend_images/category/'.$filename;
                    Image::make($image_tmp)->resize(148,148)->save($image_path);

                    // Store image name in category table
                    $category->image = $filename;
                }
            }else{
                $category->image = '';
            }

            $category->save();
            return redirect('/admin/add-product/')->with('flash_message_success','Category added Successfully!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            // Upload Product image
            if($request->hasFile('image')){
                $image_tmp = $request->image;
                $filename = time().'.'.$image_tmp->clientExtension();

                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $image_path = 'images/frontend_images/category/'.$filename;

                    // Resizes image
                    Image::make($image_tmp)->resize(148,148)->save($image_path);
                }
            } else if(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
                $filename = '';
            }

            $tempURL = strtolower($data['category_name']);
            $url = str_replace(' ', '-', $tempURL);

            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'url'=>$url,'image'=>$filename]);
            return redirect('/admin/view-categories')->with('flash_message_success','Category updated Successfully!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            // return redirect()->back()->('flash_message_success','Category Deleted Successfully');
            return redirect('/admin/view-categories')->with('flash_message_success','Category Deleted Successfully');
        }
    }

    public function viewCategories(){
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
