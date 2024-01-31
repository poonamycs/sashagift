<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\StockCategory;
use App\StockItem;
use App\Models\StockDistribute;
use App\Models\Admin;
use Auth;
use Session;
use Image;
use Illuminate\Support\Facades\Mail;
use App\Exports\stockItemsExport;
use Maatwebsite\Excel\Facades\Excel;
use carbon\carbon;
use Illuminate\Support\Arr;

class StockController extends Controller
{
    public function stockCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['category_name'])){
                return redirect()->back()->with('flash_message_error','Please select category.');
            }
            $category = new StockCategory;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];

            $tempURL = strtolower($data['category_name']);
            $url = str_replace(' ', '-', $tempURL);
            $category->url = $url;

            $category->save();
            return redirect()->back()->with('flash_message_success','Category added Successfully!');
        }
        $levels = StockCategory::where(['parent_id'=>0])->get();
        $categories = StockCategory::get();
        return view('admin.stock.stock_category')->with(compact('levels','categories'));
    }

    public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $tempURL = strtolower($data['category_name']);
            $url = str_replace(' ', '-', $tempURL);

            StockCategory::where(['id'=>$id])->update(['name'=>$data['category_name'],'url'=>$url]);
            return redirect('admin/stock-category/')->with('flash_message_success','Category updated Successfully!');
        }
        $categoryDetails = StockCategory::where(['id'=>$id])->first();
        $levels = StockCategory::where(['parent_id'=>0])->get();
        return view('admin.stock.edit_stock_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            StockCategory::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category Deleted Successfully');
        }
    }

    public function addItem(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Please select category.');    
            }

    		$item = new StockItem;
    		// $item->product_name = $data['product_name'];
    		$item->category_id = $data['category_id'];    		
    		$item->sku = $data['sku'];
    		$item->brand = $data['brand'];
    		$item->arrival_date = $data['arrival_date'];
    		// $item->exp = $data['exp'];
    		$item->purchase_price = $data['purchase_price'];
    		$item->sell_price = $data['sell_price'];
    		$item->quantity = $data['quantity'];
    		$item->supplier_name = $data['supplier_name'];

    		if(!empty($data['descr'])){
                $item->descr = $data['descr'];
            }else{
                $item->descr = '';             
            }

            if($request->hasFile('image')){
    			$image_tmp = $request->image;
    			$filename = time() . '.'.$image_tmp->clientExtension();

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,999999).'.'.$extension;
    				$image_path = 'images/backend_images/stock-items/'.$filename;
    				Image::make($image_tmp)->save($image_path);

    				$item->image = $filename;
    			}
    		}
    		$item->save();
    		return redirect()->back()->with('flash_message_success', 'New Item added Successfully.');
    	}

    	$categories = StockCategory::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected disabled>-- Select --</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = StockCategory::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			$categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
        $levels = StockCategory::where(['parent_id'=>0])->get();
    	return view('admin.stock.add_item')->with(compact('categories_dropdown','levels'));
    }

    public function editItem(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            if($request->hasFile('image')){
                $image_tmp = $request->image;
                $filename = time() . '.'.$image_tmp->clientExtension();

                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $image_path = 'images/backend_images/stock-items/'.$filename;

                    Image::make($image_tmp)->save($large_image_path);           
                } 
            }else if(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
                $filename = '';
            }           

            if(empty($data['descr'])){
                $data['descr'] = '';
            }

            StockItem::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'sku'=>$data['sku'],'brand'=>$data['brand'],'arrival_date'=>$data['arrival_date'],'purchase_price'=>$data['purchase_price'],'sell_price'=>$data['sell_price'],'quantity'=>$data['quantity'],'supplier_name'=>$data['supplier_name'],'descr'=>$data['descr'],'image'=>$filename]);
            return redirect()->back()->with('flash_message_success','Item updated successfully!');
        }

        // Get product Details
        $itemDetails = StockItem::where(['id'=>$id])->first();

        // Ctaegories dropdown start
        $categories = StockCategory::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>-- Select --</option>";
        foreach($categories as $cat){
            if($cat->id==$itemDetails->category_id){
                $selected = "Selected";
            }else{
                $selected = "";
            }

            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = StockCategory::where(['parent_id' => $cat->id])->get();
            foreach($sub_categories as $sub_cat){
                if($sub_cat->id==$itemDetails->category_id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_dropdown .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";  
            }
        }
        return view('admin.stock.edit_item')->with(compact('itemDetails','categories_dropdown'));
    }

    public function viewStockItems(){
    	$stockItems = StockItem::orderBy('id','DESC')->get();
    	// dd($stockItems);
    	foreach($stockItems as $key => $val){
            $category_name = StockCategory::where(['id'=>$val->category_id])->first();
            $stockItems[$key]->category_name = $category_name->name;
        }
    	return view('admin.stock.view_stock_items',with(compact('stockItems')));
    }

    public function deleteItem($id){
    	StockItem::where('id',$id)->delete();
    	return redirect()->back()->with('flash_message_success','Stock item deleted');
    }

    public function addVendorItems(Request $request, $id){
        $products = StockItem::with('stockCategories')->where('id',$id)->get();
        
        $categories = StockCategory::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>-- Select --</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = StockCategory::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        return view('admin.stock.add_vendor_item')->with(compact('categories_dropdown','products'));
    }

    public function exportStockItems(){
        return Excel::download(new stockItemsExport,'stock-item-details.xlsx');
    }

    public function vendorDistribution(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Please select category.');
            }
            if(empty($data['vendor'])){
                return redirect()->back()->with('flash_message_error','Please select vendor.');
            }

            $stock = new StockDistribute;
            $stock->category_id = $data['category_id'];
            $stock->quantity = $data['quantity'];
            $stock->vendor = $data['vendor'];
            $stock->price = $data['price'];
            $stock->date = $data['date'];
            $stock->save();

            // reduce stock after distibuting
            $getQty = StockItem::where('category_id', $data['category_id'])->first();
            $newStock = $getQty->quantity - $data['quantity'];
            if($newStock < 0){
                $newStock = 0;
            }
            StockItem::where('category_id',$data['category_id'])->update(['quantity'=>$newStock]);

            return redirect()->back()->with('flash_message_success','Record added successfully');
        }

        $categories = StockCategory::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>- Select Category -</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = StockCategory::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }

        $levels = StockCategory::where(['parent_id'=>0])->get();
        $vendors = Admin::where('vname','<>','Superadmin')->get();

        $stocks = StockDistribute::orderBy('id','DESC')->get();
        foreach($stocks as $key => $val){
            $category_name = StockCategory::where(['id'=>$val->category_id])->first();
            $stocks[$key]->category_name = $category_name->name;
        }
        foreach($stocks as $key => $val){
            $vendor_name = Admin::where(['id'=>$val->vendor])->first();
            
            $stocks[$key]->vendor_name = $vendor_name->vname;
            $stocks[$key]->vendor_pincode = $vendor_name->vpincode;
        }
        return view('admin.stock.stock_distribution',compact('categories_dropdown','levels','vendors','stocks'));
    }

    public function viewVendorStocks($id){
        $vendorStocks = StockDistribute::where('vendor',$id)->orderBy('id','DESC')->get();
        // dd($vendorStocks);
        
        foreach($vendorStocks as $key => $val){
            $category_name = StockCategory::where(['id'=>$val->category_id])->first();
            $vendorStocks[$key]->category_name = $category_name->name;
        }
        foreach($vendorStocks as $key => $val){
            $vendor_name = Admin::where(['id'=>$val->vendor])->first();            
            $vendorStocks[$key]->vendor_name = $vendor_name->vname;
            $vendorStocks[$key]->vendor_pincode = $vendor_name->vpincode;
        }
        return view('admin.stock.vendor_stock')->with(compact('vendorStocks'));
    }

    public function editVendorStockItem(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            $getQty = StockItem::where('category_id', $data['category_id'])->first();
            $getCurrentQty = StockDistribute::where('category_id', $data['category_id'])->first();
            
            $newStock = ($getQty->quantity+$getCurrentQty->quantity) - $data['quantity'];
            if($newStock < 0){
                $newStock = 0;
            }
            StockItem::where('category_id', $data['category_id'])->update(['quantity'=>$newStock]);

            StockDistribute::where('id',$id)->update(['category_id'=>$data['category_id'],'vendor'=>$data['vendor'],'quantity'=>$data['quantity'],'price'=>$data['price'],'date'=>$data['date']]);
            return redirect()->back()->with('flash_message_success','Record updated successfully!');
        }

        $vendorStockDetails = StockDistribute::where('id',$id)->first();

        $categories = StockCategory::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id==$vendorStockDetails->category_id){
                $selected = "Selected";
            }else{
                $selected = "";
            }

            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = StockCategory::where(['parent_id' => $cat->id])->get();
            foreach($sub_categories as $sub_cat){
                if($sub_cat->id==$vendorStockDetails->category_id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_dropdown .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";  
            }
        }

        $vendors = Admin::where('vname','<>','Superadmin')->get();
        
        $vendor_name = Admin::where(['id'=>$vendorStockDetails->vendor])->first();
        $vendorStockDetails->vendor_name = $vendor_name->vname;
        $vendorStockDetails->vendor_pincode = $vendor_name->vpincode;
        
        return view('admin.stock.edit_stock_distribution',compact('categories_dropdown','vendors','vendorStockDetails'));
    }

    public function deleteVendorStockItem($id){
        StockDistribute::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Record deleted successfully');
    }

    public function getItemQuantity(Request $request){
        $data = $request->all();
        $proAttr = StockItem::where(['category_id'=>$data['idCat']])->first();
        echo $proAttr->quantity; 
    }

    public function viewSingleVendorStock(){
        $email = session('adminSession');
        $auth = Admin::where('email',$email)->first();
        
        $categories = StockCategory::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>- Select Category -</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = StockCategory::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }

        $levels = StockCategory::where(['parent_id'=>0])->get();
        $vendors = Admin::where('vname','<>','Superadmin')->get();

        $stocks = StockDistribute::where('vendor',$auth->id)->orderBy('id','DESC')->get();
        foreach($stocks as $key => $val){
            $category_name = StockCategory::where(['id'=>$val->category_id])->first();
            $stocks[$key]->category_name = $category_name->name;
        }
        foreach($stocks as $key => $val){
            $vendor_name = Admin::where(['id'=>$val->vendor])->first();
            
            $stocks[$key]->vendor_name = $vendor_name->vname;
            $stocks[$key]->vendor_pincode = $vendor_name->vpincode;
        }
        
        return view('admin.stock.view_single_vendor_stock')->with(compact('categories_dropdown','levels','vendors','stocks'));
    }

}
