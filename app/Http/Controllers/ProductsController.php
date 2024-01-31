<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Input;       //this image header not working in laravel 6.x
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use Session;
use Image;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use App\Models\User;
use App\Models\Country;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Search;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;
use App\Exports\productsExport;
use App\Exports\ordersExport;
use Maatwebsite\Excel\Facades\Excel;
use carbon\carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Milon\Barcode\DNS1D;
date_default_timezone_set('Asia/Kolkata');

class ProductsController extends Controller
{

    public function addProduct(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();

            $productCount = Product::where('product_name',$data['product_name'])->count();
    		if($productCount>0){
                return redirect()->back()->with('flash_message_error',''. $data['product_name'] .', name is already used! Use another product name.'); 
            }

            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Please select product category.');
            }
    		// echo "<pre>"; print_r($data); die;
    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
            $product->email = $data['email'];
            $product->admin_approved = $data['admin_approved'];
            $product->unit = $data['unit'];

    		if(!empty($data['product_brand'])){
                $product->product_brand = $data['product_brand'];
            }else{
                $product->product_brand = '';
            }

            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = '';
            }

            if(!empty($data['care'])){
                $product->care = $data['care'];
            }else{
                $product->care = '';
            }

            if(!empty($data['discount'])){
                $product->discount = $data['discount'];
            }else{
                $product->discount = '';
            }

    		$product->price = $data['price'];

    		// Upload Product image
    		if($request->hasFile('image')){
    			$image_tmp = $request->image;
    			$filename = time() . '.'.$image_tmp->clientExtension();

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$large_image_path = 'images/backend_images/products/large/'.$filename;
    				$medium_image_path = 'images/backend_images/products/medium/'.$filename;
    				$small_image_path = 'images/backend_images/products/small/'.$filename;

    				// Resizes image
    				Image::make($image_tmp)->save($large_image_path);
    				Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    				Image::make($image_tmp)->resize(300,300)->save($small_image_path);

    				// Store image name in products table
    				$product->image = $filename;
    			}
    		}

            if(empty($data['status'])){
                $status = 0;                
            }else{
                $status = 1;  
            }

            if(empty($data['featured'])){
                $featured = 0;                
            }else{
                $featured = 1;  
            }

    		$product->status = $status;
            $product->featured = $featured;
            $product->save();
    		return redirect('/admin/view-all-products')->with('flash_message_success','Product has been Added Successfully');  		
    	}

    	// Categories dropdown start
    	$categories = Category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected disabled>Select</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			$categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
    	// categories dropdown ends

    	return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function editProduct(Request $request, $pid){
        $id = Crypt::decrypt($pid);
    	if($request->isMethod('post')){
    		$data = $request->all();

    		// Upload Product image
    		if($request->hasFile('image')){

    			// $image_tmp = Input::file('image'); //not working in laravel 6.6
    			$image_tmp = $request->image;			// so used this
    			$filename = time() . '.'.$image_tmp->clientExtension(); //so used this 

    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$large_image_path = 'images/backend_images/products/large/'.$filename;
    				$medium_image_path = 'images/backend_images/products/medium/'.$filename;
    				$small_image_path = 'images/backend_images/products/small/'.$filename;

    				// Resizes image
    				Image::make($image_tmp)->save($large_image_path);
    				Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    				Image::make($image_tmp)->resize(300,300)->save($small_image_path);    			
    			} 
            }else if(!empty($data['current_image'])){
    			$filename = $data['current_image'];
            }else{
                $filename = '';
    		}    		

    		if(empty($data['unit'])){
    			$data['unit'] = '';
    		}         

            if(empty($data['product_brand'])){
                $data['product_brand'] = '';
            }         

            if(empty($data['description'])){
                $data['description'] = '';
            }

            if(empty($data['care'])){
                $data['care'] = '';
            }  

            if(empty($data['discount'])){
                $data['discount'] = '';
            }            

            if(empty($data['status'])){
                $status = 0;                
            }else{
                $status = 1;  
            }            

            if(empty($data['featured'])){
                $featured = 0;                
            }else{
                $featured = 1;  
            }

    		Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_brand'=>$data['product_brand'],'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],'discount'=>$data['discount'],'image'=>$filename,'featured'=>$featured,'status'=>$status,'unit'=>$data['unit']]);
    		return redirect()->back()->with('flash_message_success','Product Updated Successfully!');
    	}

    	// Get product Details
    	$productDetails = Product::where(['id'=>$id])->first();

    	// Ctaegories dropdown start
    	$categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id==$productDetails->category_id){
                $selected = "Selected";
            }else{
                $selected = "";
            }

            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach($sub_categories as $sub_cat){
                if($sub_cat->id==$productDetails->category_id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_dropdown .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";  
            }
        }
    	// categories dropdown ends

    	return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }

    public function deleteProduct($pid){
        $id = Crypt::decrypt($pid);
        Product::where(['id'=>$id])->delete(); 
        return redirect()->back()->with('flash_message_success','Product Deleted Successfully!');
    }

    public function deleteProductImage($id = null){
        //Get product image name
        $productImage = Product::where(['id'=>$id])->first();

        //get image path
        $large_image_path  = 'images/backend_images/products/large/';
        $medium_image_path = 'images/backend_images/products/medium/';
        $small_image_path  = 'images/backend_images/products/small/';

        //delete large image if not exits in folder
        if(file_exists($large_image_path.$productImage->image)){
            // echo $large_image_path.$productImage->image; die;
            unlink($large_image_path.$productImage->image);
        }

        //delete medium image if not exits in folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        //delete small image if not exits in folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        //delete image from product table
    	Product::where(['id'=>$id])->update(['image'=>'']);
    	return redirect()->back()->with('flash_message_success','Product Image has been Deleted');
    }

    public function viewProducts(){
        // echo session('adminSession'); die;
    	$products = Product::orderBy('id','DESC')->where('email',session('adminSession'))->get();
    	foreach($products as $key => $val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
    	return view('admin.products.view_products')->with(compact('products'));
    }

    public function viewAdminProducts(){
        // echo session('adminSession'); die;
        $productsAdmin = Product::orderBy('id','DESC')->get();
        foreach($productsAdmin as $key => $val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $productsAdmin[$key]->category_name = $category_name->name;
        }
        return view('admin.products.view_all_products')->with(compact('productsAdmin'));
    }

    public function addAttributes(Request $request, $pid=null){
        $id = Crypt::decrypt($pid);
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data); die;
            foreach ($data['sku'] as $key => $val){
                if(!empty($val)){

                    //prevent duplicate SKU
                    $attrCountSKU = ProductsAttribute::where('sku',$val)->count();
                    if($attrCountSKU>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error','SKU Already Used! Try another SKU.');
                    }

                    //prevent duplicate size
                    $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error',''.$data['size'][$key].' Size Already Exists! Please add another Size.');
                    }

                    $attribute = new ProductsAttribute;
                    $attribute->sku = $val;
                    $attribute->product_id = $id;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->unit = $data['unit'][$key];
                    $attribute->save();
                }
            }
            return redirect()->back()->with('flash_message_success','Product attributes has been Added Successfully!');
        }
        return view('admin.products.add_attributes',compact('productDetails'));
    }

    public function editAttributes(Request $request, $pid=null){
        $id = Crypt::decrypt($pid);
        if($request->isMethod('post')){
            $data =$request->all();
            // echo "<pre>"; print_r($data); die;
            foreach ($data['idAttr'] as $key => $attr) {
                ProductsAttribute::where(['id'=>$data['idAttr'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key],'unit'=>$data['unit'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Products Attributes has been updated successfully!');
        }
    }

    public function addImages(Request $request, $pid=null){
        $id = Crypt::decrypt($pid);
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();

        // $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        // $category_name = $categoryDetails->name;
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;                  

                    $large_image_path  = 'images/backend_images/products/large/'.$fileName;
                    $medium_image_path = 'images/backend_images/products/medium/'.$fileName;
                    $small_image_path  = 'images/backend_images/products/small/'.$fileName;   

                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);

                    $image->image = $fileName;  
                    $image->product_id = $data['product_id'];
                    $image->save();
                }   
            }
            return redirect()->back()->with('flash_message_success', 'Product Images has been added successfully');
        }
        $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();
        $title = "Add Images";
        return view('admin.products.add_images')->with(compact('productDetails','title','productImages'));
    }

    public function deleteAltImage($id=null){
        //Get product image name
        $productImage = ProductsImage::where(['id'=>$id])->first();

        //get image path
        $large_image_path  = 'images/backend_images/products/large/';
        $medium_image_path = 'images/backend_images/products/medium/';
        $small_image_path  = 'images/backend_images/products/small/';

        //delete large image if not exits in folder
        if(file_exists($large_image_path.$productImage->image)){
            // echo $large_image_path.$productImage->image; die;
            unlink($large_image_path.$productImage->image);
        }

        //delete medium image if not exits in folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        //delete small image if not exits in folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        //delete image from product table
        ProductsImage::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product Alternate Image has been Deleted');
    }

    public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Attributes has been Deleted Successfully!');
    }

    public function products($url=null){
        //show 404 page if category not found
        $countCategory = Category::where(['url'=>$url])->count();
        if($countCategory == 0 ){
            return view('404');
            // abort('404');
        }

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $categoryDetails = Category::where(['url' => $url])->first();
        if($categoryDetails->parent_id==0){
            //if url is main category url
            $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
            foreach($subCategories as $subcat){
                $cat_ids[] = $subcat->id;
            }
            $productsAll = Product::whereIn('products.category_id', $cat_ids)->where(['products.status'=>1,'admin_approved'=>1])->orderBy('products.id','DESC');
            $breadcrumb = "<a href='../../home'><span class='mdi mdi-home'></span> <strong>Home</strong></a> <span class='mdi mdi-chevron-right'></span> <a class='text-capitalize' href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";
        }else{
            //if url is subcategory url
            $productsAll = Product::where(['products.category_id'=>$categoryDetails->id])->where('products.status','1')->orderBy('products.id','DESC');
            $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
            $breadcrumb = "<a href='../../home/'><span class='mdi mdi-home'></span> <strong>Home</strong></a> <span class='mdi mdi-chevron-right'></span> <a class='text-capitalize' href='".$mainCategory->url."'>".$mainCategory->name."</a> <span class='mdi mdi-chevron-right'></span> <a class='text-capitalize' href='/products/".$categoryDetails->url."'>".$categoryDetails->name."</a>";
        }

        // if(!empty($_GET['brand'])){
        //     $brandArray = explode("-",$_GET['brand']);
        //     $productsAll = $productsAll->whereIn('product_brand',$brandArray);
        // }
        $productsAll = $productsAll->paginate(9);

        $brandArray = Product::select('product_brand')->groupBy('product_brand')->get();
        $brandArray = Arr::flatten(json_decode(json_encode($brandArray),true));

        $meta_title = $categoryDetails->meta_title;
        $meta_description = $categoryDetails->meta_description;
        $meta_keywords = $categoryDetails->meta_keywords;

        return view('products.listing')->with(compact('categoryDetails','productsAll','categories','meta_title','meta_description','meta_keywords','breadcrumb','url','brandArray'));
    }

    public function categories($url=null){
        //show 404 page if category not found
        $countCategory = Category::where(['url'=>$url])->count();
        if($countCategory == 0 ){
            return view('404');
            // abort('404');
        }

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->paginate(9);
        $categoryDetails = Category::where(['url' => $url])->first();
        if($categoryDetails->parent_id==0){
            //if url is main category url
            $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->paginate(9);
            foreach($subCategories as $subcat){
                $cat_ids[] = $subcat->id;
            }
            $productsAll = Product::whereIn('category_id', $cat_ids)->where('status',1)->paginate(9);    
        }else{
            //if url is subcategory url
            $productsAll = Product::where(['category_id' => $categoryDetails->id])->paginate(9);            
        }

        // if(!empty($_GET['brand'])){
        //     $brandArray = explode("-",$_GET['brand']);
        //     $productsAll = $productsAll->whereIn('product_brand',$brandArray);
        // }
        // $productsAll = $productsAll->paginate(9)

        return view('layouts.frontLayout.front_design')->with(compact('categoryDetails','productsAll','categories'));
    }

    public function filter(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        $brandUrl = "";
        if(!empty($data['brandFilter'])){
            foreach($data['brandFilter'] as $brand){
                if(empty($brandUrl)){
                    $brandUrl = "&brand=".$brand;
                }else{
                    $brandUrl .= "-".$brand;
                }
            }
        }

        $finalUrl = "products/".$data['url']."?".$brandUrl;
        return redirect::to($finalUrl);
    }

    public function product($id = null){
        $productsCount = Product::where(['id'=>$id, 'status'=>1])->count();
        if($productsCount == 0){
           return view('404'); 
        }

        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        // echo "<pre>"; print_r($productDetails); die;
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->get();
        // dd($productDetails->category_id);

        // foreach ($relatedProducts->chunk(3) as $chunk) {
        //     foreach ($chunk as $item) {
        //         echo $item; echo "<br />";
        //     }
        //     echo "<br><br><br>";
        // }

        //Get categories and Subcategories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::where('id', $productDetails->category_id)->first();
        if($categoryDetails->parent_id==0){            
            $breadcrumb = "<a href='/'><span class='mdi mdi-home'></span> <strong>Home</strong></a> <span class='mdi mdi-chevron-right'></span> <a class='text-capitalize' href='".$categoryDetails->url."'>".$categoryDetails->name."</a><span class='mdi mdi-chevron-right'></span> ".$productDetails->product_name;
        }else{
            $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
            $breadcrumb = "<a href='/'><span class='mdi mdi-home'></span> <strong>Home</strong></a> <span class='mdi mdi-chevron-right'></span> <a class='text-capitalize' href='/products/".$mainCategory->url."'>".$mainCategory->name."</a> <span class='mdi mdi-chevron-right'></span> <a class='text-capitalize' href='/products/".$categoryDetails->url."'>".$categoryDetails->name."</a> <span class='mdi mdi-chevron-right'></span> ".$productDetails->product_name;
        }
        
        if(!empty($mainCategory)){
            $mainCategory = $mainCategory;
        }

        //Get Product Alternate images
        $productAltImages = ProductsImage::where('product_id',$id)->get();
        $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

        $meta_title = $productDetails->product_name.' | Veggi Mart';
        $meta_description = $productDetails->product_name.' | Veggi Mart';
        $meta_keywords = $productDetails->product_name.' | Veggi Mart';
        return view('products.detail')->with(compact('productDetails','categories','productAltImages','total_stock','relatedProducts','meta_title','meta_description','meta_keywords','breadcrumb'));
    }

    public function getProductPrice(Request $request){
        $data = $request->all(); 
        // echo "<pre>"; print_r($data); die;
        $proArr = explode("-",$data['idSize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price; 
        echo "#";
        echo $proAttr->stock; 
    }

    public function addtocart(Request $request){
        $data = $request->all();
        // dd($data);

        if(!empty($data['wishListButton']) && $data['wishListButton']=="Wish List"){
            // echo "Wish List is selected"; die;
            // check user is logged in
            if(!Auth::check()){
                return redirect()->back()->with('flash_message_error','Please login to add product in your wishlist. <a href="../login-register">Login Now</a>');
            }

            //get product size
            $sizeArr = explode("-", $data['size']);
            $product_size = $sizeArr[1];

            // get product price
            $proPrice = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size])->first();
            $product_price = $proPrice->price;

            // get username/email
            $user_email = Auth::User()->email;
            $quantity = 1;
            $created_at = Carbon::now();

            $wishListCount = DB::table('wish_list')->where(['user_email'=>$user_email,'product_id'=>$data['product_id'],'product_brand'=>$data['product_brand'],'size'=>$product_size])->count();

            if($wishListCount>0){
                return redirect()->back()->with('flash_message_error','Product already added in Wishlist. <a href="../my-wishlist">See Wishlist</a>');
            }else{
                DB::table('wish_list')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_brand'=>$data['product_brand'],'price'=>$product_price,'size'=>$product_size,'quantity'=>$quantity,'user_email'=>$user_email,'email'=>$data['email'],'image' => $data['image'],'created_at'=>$created_at]);
                return redirect()->back()->with('flash_message_success','Product added to Wishliist. <a href="../my-wishlist">See Wishlist</a>');
            }

        }else{

            //if product added from wishlist
            if(!empty($data['cartButton']) && $data['cartButton']=="Add to Cart"){
                $data['quantity'] = 1;
            }

            //check product stock available or not
            $product_size = explode("-",$data['size']);
            $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();

            if($getProductStock->stock<$data['quantity']){
                return redirect()->back()->with('flash_message_error','Required quantity is not available!');
            }

            if(empty(Auth::User()->email)){
                $data['user_email'] = '';
            }else{
                $data['user_email'] = Auth::user()->email;
            }

            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);            
            }

            $sizeArr = explode("-", $data['size']);
            $product_size = $sizeArr[1];

            if(empty(Auth::check())){
                $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_brand' => $data['product_brand'],'size' => $product_size,'session_id' => $session_id])->count();
                if($countProducts>0){
                    return redirect()->back()->with('flash_message_error','Product already added in cart. <a href="../cart"> View Shopping Cart</a>');
                }
            }else{
                $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_brand' => $data['product_brand'],'size' => $product_size,'user_email' => $data['user_email']])->count();
                if($countProducts>0){
                    return redirect()->back()->with('flash_message_error','Product already added in cart.<a href="../cart"> View Shopping Cart</a>');
                }
            }

            $getSKU = ProductsAttribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$product_size])->first();
            // echo $getSKU['sku']; die;

            DB::table('cart')->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],'product_code' => $getSKU->sku,'product_brand' => $data['product_brand'],'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id,'email' => $data['email'],'image' => $data['image']]);

            return redirect()->back()->with('flash_message_success','Product added in Cart! <a href="../cart"> View Shopping Cart</a>');
        }
    }

    public function cart(Request $request){
        // $session_id = Session::get('session_id');
        // $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();

        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();    
        }

        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        // echo "<pre>"; print_r($userCart);
        $meta_title = "Shopping Cart | Veggi Mart";
        return view('products.cart')->with(compact('userCart','meta_title'));
    }

    public function wishList(Request $request){
        if(Auth::check()){
            $user_email = Auth::User()->email;
            $userWishList = DB::table('wish_list')->where('user_email',$user_email)->paginate(6);
            $categories = Category::with('categories')->where(['parent_id'=>0])->get();

            foreach($userWishList as $key => $product){
                $productDetails = Product::where('id',$product->product_id)->first();
                $userWishList[$key]->image = $productDetails->image;
            }
        }else{
            $userWishList = array();
        }
        $meta_title = "My Wishlist | Veggi Mart";
        return view('products.wishlist')->with(compact('userWishList','categories','meta_title'));
    }

    public function updateCartQuantity($id = null,$quantity = null){
        $getCartDetails = DB::table('cart')->where('id',$id)->first();
        $getAttributeStock = ProductsAttribute::where('sku',$getCartDetails->product_code)->first();
        $updated_quantity = $getCartDetails->quantity+$quantity;
        if($getAttributeStock->stock >= $updated_quantity){            
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return redirect('cart')->with('flash_message_success','Product quantity has been updated!');
        }else{
            return redirect('cart')->with('flash_message_error','Required Product quantity is not available! please try another size.');
        }
    }

    public function deleteCartProduct($id = null){
        DB::table('cart')->where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Product removed from Cart!');
    }

    public function deleteWishlistProduct($id = null){
        DB::table('wish_list')->where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Product deleted from wishlist.');
    }

    public function checkout(Request $request){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        //Check if Shipping Address exists
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount>0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        // Update cart table with user email
        $session_id = Session::get('session_id');
        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //return to checkout page if any field is empty
            if(empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) || empty($data['billing_pincode']) || empty($data['billing_mobile']) || empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_country']) || empty($data['shipping_pincode']) || empty($data['shipping_mobile'])){
                return redirect()->back()->with('flash_message_error','Please fill all fields to continue.');
            }
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'pincode'=>$data['billing_pincode'],'country'=>$data['billing_country'],'mobile'=>$data['billing_mobile']]);

            if($shippingCount>0){
                // Update Shipping Address
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'pincode'=>$data['shipping_pincode'],'country'=>$data['shipping_country'],'mobile'=>$data['shipping_mobile']]);
            }else{
                // Add New Shipping Address
                $shipping = new DeliveryAddress;
                $shipping->user_id = $user_id;
                $shipping->user_email = $user_email;
                $shipping->name = $data['shipping_name'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->country = $data['shipping_country'];
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->save();
            }

            $pincodeCount = DB::table('shipping_charges')->where('pincode',$data['shipping_pincode'])->count();
            if($pincodeCount==0){
                return redirect()->back()->with('flash_message_error','Your location/pinocde is not available for delivery. Please enter another shipping location/pincode.');
            }

            // echo "Redirect to order review page";
            return redirect()->action('ProductsController@orderReview');
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('products.checkout')->with(compact('userDetails','countries','shippingDetails','categories'));
    }

    public function orderReview(){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();

        $shippingDetails = json_decode(json_encode($shippingDetails));
        
        $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        // echo "<pre>"; print_r($userCart); die;
        $codpincodeCount = DB::table('cod_pincodes')->where('pincode',$shippingDetails->pincode)->count();
        $prepaidpincodeCount = DB::table('prepaid_pincodes')->where('pincode',$shippingDetails->pincode)->count();

        // fetch shipping charges
        $shippingCharges = Product::getShippingCharges($shippingDetails->pincode);

        $meta_title = "Order Overview | Veggi Mart";
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart','codpincodeCount','prepaidpincodeCount','categories','meta_title','shippingCharges'));
    }

    public function placeOrder(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            dd($data);
            Session::put('grand_total',$data['grand_total']);
            if($data['payment_method']=="COD"){
                return redirect('/thanks');
            }else{                
                return redirect('/razorpay');
            }
        }
    }

    public function thanks(Request $request){
        $user_id = Auth::User()->id;
        $user_email = Auth::user()->email;

        // get shipping address of user
        $shippingDetails = DeliveryAddress::where('user_email',$user_email)->first();

        $pincodeCount = DB::table('pincodes')->where('pincode',$shippingDetails->pincode)->count();
        if($pincodeCount==0){
            return redirect()->back()->with('flash_message_error','Your location is not available for delivery. Please choose another location.');
        }

        if(empty($data['coupon_code'])){
            $data['coupon_code']='';
        }

        if(empty($data['coupon_amount'])){
            $data['coupon_amount']='';
        }

        if(empty($data['shipping_charges'])){
            $data['shipping_charges']=0;
        }

        $shippingCharges = Product::getShippingCharges($shippingDetails->pincode);
        $vendorCount = Admin::where('vpincode',$shippingDetails->pincode)->count();
        if($vendorCount > 0){
            $vpincode = $shippingDetails->pincode;
        }else{
            $vpincode = '';
        }

        $order = new Order;
        $order->user_id = $user_id;
        $order->user_email = $user_email;
        $order->name = $shippingDetails->name;
        $order->address = $shippingDetails->address;
        $order->city = $shippingDetails->city;
        $order->state = $shippingDetails->state;
        $order->pincode = $shippingDetails->pincode;
        $order->vpincode = $vpincode;
        $order->country = $shippingDetails->country;
        $order->mobile = $shippingDetails->mobile;
        $order->coupon_code = $data['coupon_code'];
        $order->coupon_amount = $data['coupon_amount'];
        $order->order_status = "New";            
        $order->payment_method = 'COD';
        $order->shipping_charges = $shippingCharges;
        $order->grand_total = Session::get('grand_total');
        $order->save();

        $order_id = DB::getPdo()->lastInsertId();
        $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
        foreach ($cartProducts as $pro) {
            $cartPro = new OrdersProduct;
            $cartPro->order_id = $order_id;
            $cartPro->user_id = $user_id;
            $cartPro->email = $pro->email;
            $cartPro->product_id = $pro->product_id;
            $cartPro->product_code = $pro->product_code;
            $cartPro->product_name = $pro->product_name;
            $cartPro->product_brand = $pro->product_brand;
            $cartPro->product_size = $pro->size;
            // $product_price = Product::getProductPrice($pro->product_id,$pro->size); 
            // $cartPro->product_price = $product_price;             
            $cartPro->product_price = $pro->price;
            $cartPro->product_qty = $pro->quantity;
            $cartPro->save();

            //reduce stock script starts
            $getProductStock = ProductsAttribute::where('sku',$pro->product_code)->first();
            $newStock = $getProductStock->stock - $pro->quantity;
            if($newStock<0){
                $newStock = 0;
            }
            ProductsAttribute::where('sku',$pro->product_code)->update(['stock'=>$newStock]);
            //reduce stock scipt ends
        }
        Session::put('order_id',$order_id);
        $grand_total = Session::get('grand_total');
        Session::put('grand_total',$grand_total);

        $productDetails = Order::with('orders')->where('id',$order_id)->first();
        $userDetails = User::where('id',$user_id)->first();

        // user order confirmation mail
        $email = $user_email;
        $messageData = [
            'email' => $email,
            'name' => $shippingDetails->name,
            'order_id' => $order_id,
            'productDetails' => $productDetails,
            'userDetails' => $userDetails
        ];
        Mail::send('emails.order',$messageData,function($message) use($email){
            $message->to($email)->subject('Order Placed - Veggi Mart');    
        });

        //admin - order confirmation mail
        $email = 'sankalp@ycstech.in';
        $messageData = [
            'email' => $email,
            'name' => $shippingDetails->name,
            'order_id' => $order_id,
            'productDetails' => $productDetails,
            'userDetails' => $userDetails
        ];
        Mail::send('emails.admin_order',$messageData,function($message) use($email){
            $message->to($email)->subject('New Order Received - Veggi Mart');    
        });

        DB::table('cart')->where('user_email',$user_email)->delete();

        return view('orders.thanks');
    }

    public function razorpay(Request $request){
        $user_email = Auth::user()->email;
        // DB::table('cart')->where('user_email',$user_email)->delete();
        $meta_title = 'Make Payment | Veggi Mart';
        // return view('orders.payment_details')->with(compact('meta_title'));
        return view('orders.razorpay')->with(compact('meta_title'));
    }

    public function thanksRazorpay(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $user_id = Auth::User()->id;
            $user_email = Auth::user()->email;

            // get shipping address of user
            $shippingDetails = DeliveryAddress::where('user_email',$user_email)->first();

            $pincodeCount = DB::table('pincodes')->where('pincode',$shippingDetails->pincode)->count();
            if($pincodeCount==0){
                return redirect()->back()->with('flash_message_error','Your location is not available for delivery. Please choose another location.');
            }

            if(empty($data['coupon_code'])){
                $data['coupon_code']='';
            }

            if(empty($data['coupon_amount'])){
                $data['coupon_amount']='';
            }

            if(empty($data['shipping_charges'])){
                $data['shipping_charges']=0;
            }

            $shippingCharges = Product::getShippingCharges($shippingDetails->pincode);
            $vendorCount = Admin::where('vpincode',$shippingDetails->pincode)->count();
            if($vendorCount > 0){
                $vpincode = $shippingDetails->pincode;
            }else{
                $vpincode = '';
            }

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->vpincode = $vpincode;
            $order->country = $shippingDetails->country;
            $order->mobile = $shippingDetails->mobile;
            $order->coupon_code = $data['coupon_code'];
            $order->coupon_amount = $data['coupon_amount'];
            $order->order_status = "New";            
            $order->payment_method = 'COD';
            $order->shipping_charges = $shippingCharges;
            $order->grand_total = Session::get('grand_total');
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();
            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
            foreach ($cartProducts as $pro) {
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->email = $pro->email;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_brand = $pro->product_brand;
                $cartPro->product_size = $pro->size;
                // $product_price = Product::getProductPrice($pro->product_id,$pro->size); 
                // $cartPro->product_price = $product_price;             
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();

                //reduce stock script starts
                $getProductStock = ProductsAttribute::where('sku',$pro->product_code)->first();
                $newStock = $getProductStock->stock - $pro->quantity;
                if($newStock<0){
                    $newStock = 0;
                }
                ProductsAttribute::where('sku',$pro->product_code)->update(['stock'=>$newStock]);
                //reduce stock scipt ends
            }
            Session::put('order_id',$order_id);
            $grand_total = Session::get('grand_total');
            Session::put('grand_total',$grand_total);

            $productDetails = Order::with('orders')->where('id',$order_id)->first();
            $userDetails = User::where('id',$user_id)->first();

            // user order confirmation mail
            $email = $user_email;
            $messageData = [
                'email' => $email,
                'name' => $shippingDetails->name,
                'order_id' => $order_id,
                'productDetails' => $productDetails,
                'userDetails' => $userDetails
            ];
            Mail::send('emails.order',$messageData,function($message) use($email){
                $message->to($email)->subject('Order Placed - Veggi Mart');    
            });

            //admin - order confirmation mail
            $email = 'sankalp@ycstech.in';
            $messageData = [
                'email' => $email,
                'name' => $shippingDetails->name,
                'order_id' => $order_id,
                'productDetails' => $productDetails,
                'userDetails' => $userDetails
            ];
            Mail::send('emails.admin_order',$messageData,function($message) use($email){
                $message->to($email)->subject('New Order Received - Veggi Mart');    
            });

            DB::table('cart')->where('user_email',$user_email)->delete();   

            $order_id = Session::get('order_id');
            $razorpay_payment_id = $data['razorpay_payment_id'];
            OrdersProduct::where(['order_id'=>$order_id])->update(['razorpay_payment_id'=>$razorpay_payment_id]);            
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('orders.thanks_razorpay')->with(compact('categories'));
    }

    public function cancelRazorpay(){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('orders.cancel_razorpay')->with(compact('categories'));
    }

    public function paypal(Request $request){
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('orders.paypal');
    }

    public function userOrders(Request $request){
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where(['user_id'=>$user_id])->orderBy('id','DESC')->get();        
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('orders.users_orders')->with(compact('orders','categories'));
    }

    public function userOrderDetails($order_id){
        $user_id = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        // echo "<pre>"; print_r($orderDetails); die;
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('orders.user_order_details')->with(compact('orderDetails','categories'));
    }

    public function viewOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->get();
        $vendors = Admin::where('vname','<>','Superadmin')->get();
        return view('admin.orders.view_orders')->with(compact('orders','vendors'));
    }

    public function viewVendorOrders(){
        $authEmail = session('adminSession');
        $vendors = Admin::where('vname','<>','Superadmin')->get();
        $vendorDetails = Admin::where('email',$authEmail)->first();
        $orders = Order::with('orders')->where('vpincode',$vendorDetails->vpincode)->orderBy('id','DESC')->get();

        return view('admin.orders.view_orders')->with(compact('orders','vendors'));
    }

    public function allocateOrder(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            Order::where('id',$id)->update(['vpincode'=>$data['vpincode']]);
            return redirect()->back()->with('flash_message_success','order allocated successfully');
        }
    }    

    public function viewDeliveredOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->where('order_status','Delivered')->get();
        $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;
        return view('admin.orders.view_delivered_orders')->with(compact('orders'));
    }

    public function viewCancelOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->where('order_status','Cancelled')->get();
        $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;
        return view('admin.orders.view_cancelled_orders')->with(compact('orders'));
    }

    public function viewNewOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->where('order_status','New')->get();
        $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;
        return view('admin.orders.view_new_orders')->with(compact('orders'));
    }

    public function viewPendingOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->where('order_status','Pending')->get();
        $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;
        return view('admin.orders.view_pending_orders')->with(compact('orders'));
    }

    public function viewShippedOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->where('order_status','Shipped')->get();
        $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;
        return view('admin.orders.view_shipped_orders')->with(compact('orders'));
    }

    public function viewOrderDetails($order_id){
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        // echo "<pre>"; print_r($orderDetails); die;
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails'));
    }

    public function viewOrderInvoice($order_id){
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        // echo "<pre>"; print_r($orderDetails); die;
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();

        return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
    }

    public function viewPDFInvoice($order_id){
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        // echo "<pre>"; print_r($orderDetails); die;
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        
        $output = '
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <title>Example 1</title>
            <style>
                .clearfix:after {
                  content: "";
                  display: table;
                  clear: both;
                }

                a {
                  color: #5D6975;
                  text-decoration: underline;
                }

                body {
                  position: relative;
                  width: 21cm;  
                  height: 29.7cm; 
                  margin: 0 auto; 
                  color: #001028;
                  background: #FFFFFF; 
                  font-family: Arial, sans-serif; 
                  font-size: 12px; 
                  font-family: Arial;
                }

                header {
                  padding: 10px 0;
                  margin-bottom: 30px;
                }

                #logo {
                  text-align: center;
                  margin-bottom: 10px;
                }

                #logo img {
                  width: 90px;
                }

                h1 {
                  color: #5D6975;
                  font-size: 2.4em;
                  line-height: 0.2em;
                  font-weight: normal;
                  text-align: center;
                  margin: 0 0 20px 10px;
                }

                h2 {
                  border-top: 1px solid  #5D6975;
                  border-bottom: 1px solid  #5D6975;
                  color: #5D6975;
                  font-size: 2em;
                  line-height: 1.4em;
                  font-weight: normal;
                  text-align: center;
                  margin: 0 0 20px 0;
                }

                #project {
                  float: left;
                }

                #project span {
                  color: #5D6975;
                  text-align: right;
                  width: 52px;
                  margin-right: 10px;
                  display: inline-block;
                  font-size: 0.8em;
                }

                #company {
                  float: right;
                  text-align: right;
                }

                #project div,
                #company div {
                  white-space: nowrap;        
                }

                table {
                  width: 100%;
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin-bottom: 20px;
                }

                table tr:nth-child(2n-1) td {
                  background: #F5F5F5;
                }

                table th,
                table td {
                  text-align: center;
                }

                table th {
                  padding: 5px 20px;
                  color: #5D6975;
                  border-bottom: 1px solid #C1CED9;
                  white-space: nowrap;        
                  font-weight: normal;
                }

                table .service,
                table .desc {
                  text-align: left;
                }

                table td {
                  padding: 20px;
                  text-align: right;
                }

                table td.service,
                table td.desc {
                  vertical-align: top;
                }

                table td.unit,
                table td.qty,
                table td.total {
                  font-size: 1.2em;
                }

                table td.grand {
                  border-top: 1px solid #5D6975;;
                }

                #notices .notice {
                  color: #5D6975;
                  font-size: 1.2em;
                }

                footer {
                  color: #5D6975;
                  width: 100%;
                  height: 30px;
                  position: absolute;
                  bottom: 0;
                  border-top: 1px solid #C1CED9;
                  padding: 8px 0;
                  text-align: center;
                }
                .col-md-6{
                    width: 50%;
                }
                .row{
                    display: flex;
                    flex-wrap: wrap;
                }
            </style>
          </head>
          <body>
            <header class="clearfix">
            <div class="row">
                <div class="col-md-6">
                  <div id="logo">
                    <img src="images/frontend_images/newlogo.png">
                  </div>
                </div>
                <div class="col-md-6" style="float: right;">
                    <div id="logo">
                        <h1> Veggi Mart</h1>
                        <p>Sector No 7, Plot No 97, Near Vishweshwar Chowk, Bhosari MIDC Pune, 411026</p>
                        <p>(+91) 7273 83 7273</p>
                        <p>info@veggimart.in</p>
                  </div>
                </div>
            </div>
              <h2>INVOICE ID #'.$orderDetails->id.'</h2>
              <div id="project" class="clearfix">
                <div><span>Order ID</span> '.$orderDetails->id.'</div>
                <div><span>Order Date</span> '.date('d M Y, h:i a', strtotime($orderDetails->created_at)).' </div>
                <div><span>Order Amount</span> '.$orderDetails->grand_total.'</div>
                <div><span>Order Status</span> '.$orderDetails->order_status.'</div>
                <div><span>Payment Method</span> '.$orderDetails->payment_method.'</div>
              </div>
              <div id="project" style="float: right;">
                <div><strong>Shipping Address</strong></div>
                <div> '.$userDetails->name.' </div>
                <div> '.$userDetails->mobile.' </div>
                <div> '.$userDetails->email.' </div>
                <div> '.$userDetails->address.' </div>
                <div> '.$userDetails->city.', '.$userDetails->state.' </div>
                <div> '.$userDetails->pincode.' </div>
                <div> '.$userDetails->country.' </div>
              </div>
            </header>
            <main>
              <table>
                <thead>
                  <tr>
                    <td style="width:18%"><strong>Product Code</strong></td>
                    <td style="width:18%" class="text-center"><strong>Size</strong></td>
                    <td style="width:18%" class="text-center"><strong>Brand</strong></td>
                    <td style="width:18%" class="text-center"><strong>Price</strong></td>
                    <td style="width:18%" class="text-center"><strong>Qty</strong></td>
                    <td style="width:18%" class="text-right"><strong>Total</strong></td>
                </tr>
                </thead>
                <tbody>';
                    $Subtotal = 0;
                    foreach($orderDetails->orders as $pro){
                    $output .= '<tr>
                        <td class="text-left">'. $pro->product_name .'</td>
                        <td class="text-center">'. $pro->product_size .'</td>
                        <td class="text-center">'. $pro->product_brand .'</td>
                        <td class="text-center">Rs. '. $pro->product_price .'</td>
                        <td class="text-center">'. $pro->product_qty .'</td>
                        <td class="text-right">Rs. '.$pro->product_price * $pro->product_qty .'</td>
                    </tr>';
                    $Subtotal = $Subtotal + ($pro->product_price * $pro->product_qty); 
                    $shipping_charges = $orderDetails->grand_total-$Subtotal; }
                    $output .= '<tr>
                    <td colspan="5">Subtotal</td>
                    <td class="total">Rs. '. $Subtotal .'</td>
                  </tr>
                  <tr>
                    <td colspan="5">Shipping Charges (+)</td>
                    <td class="total">Rs. '. $shipping_charges .'</td>
                  </tr>
                  <tr>
                    <td colspan="5" class="grand total">Grand Total</td>
                    <td class="grand total"> Rs. '. $orderDetails->grand_total .'</td>
                  </tr>
                </tbody>
              </table>
              <div id="notices">
              </div>
            </main>
            <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
          </body>
        </html>';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("OrderID#".$orderDetails->id."-".date('dMY',strtotime($orderDetails->created_at)).".pdf");
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Order::where(['id'=>$data['order_id']])->update(['order_status'=>$data['order_status']]);

            // updated Order status Email 
            $email = $data['user_email'];
            $order_id = $data['order_id'];
            $name = $data['name'];
            $order_status = $data['order_status'];
            $messageData = ['email'=>$email,'order_id'=>$order_id,'name'=>$name,'order_status'=>$order_status];
            Mail::send('emails.order_status',$messageData,function($message) use($email){
                $message->to($email)->subject('Order Status - Veggi Mart');    
            });            

            return redirect()->back()->with('flash_message_success','Order Status has been Updated.');
        }
    }

    public function searchProducts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['product'])){
                return redirect()->back(); 
            }
            $categories = Category::with('categories')->where(['parent_id'=>0])->get();
            $search_product = $data['product'];
            // $productsAll = Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->where('status',1)->paginate();

            $search = new Search;
            $search->product = $search_product;
            date_default_timezone_set('Asia/Kolkata');
            $search->save();

            $productsAll = Product::where(function($query) use($search_product){
                $query->where('product_name','like','%'.$search_product.'%')
                ->orWhere('product_code','like','%'.$search_product.'%')
                ->orWhere('description','like','%'.$search_product.'%')
                ->orWhere('product_brand','like','%'.$search_product.'%');
            })->where(['status'=>1,'admin_approved'=>1])->paginate(9);

            return view('products.listing')->with(compact('search_product','productsAll','categories'));
        }
    }

    public function checkPincode(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            echo $pincodeCount = DB::table('shipping_charges')->where('pincode',$data['pincode'])->count();
        }
    }

    public function exportProducts(){
        return Excel::download(new productsExport,'product-details.xlsx');
    }

    public function exportOrders(){
        return Excel::download(new ordersExport,'orders-details.xlsx');
    }

    public function viewOrdersCharts(){
        $current_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count();
        $last1_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
        $last2_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count();
        $last3_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count();
        $last4_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(4))->count();
        $last5_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(5))->count();
        return view('admin.orders.orders_chart')->with(compact('current_month_orders','last1_month_orders','last2_month_orders','last3_month_orders','last4_month_orders','last5_month_orders'));
    }

    public function productApproved(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            Product::where('id',$id)->update(['status'=>$status]);
            return redirect()->back()->with('flash_message_success','Product approval status updated successfully.');
        }
    }
    
    public function productsNotApproved(){
        // echo session('adminSession'); die;
        $products = Product::orderBy('id','DESC')->where('admin_approved', 0)->get();
        foreach($products as $key => $val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        return view('admin.products.products_not_approved')->with(compact('products'));
    }

    public function orderCancelStatus(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $order_status = "Cancelled";
            Order::where('id',$id)->update(['reason'=>$data['reason'],'order_status'=>$order_status]);
            return redirect()->back()->with('flash_message_error','Your order cancelled successfully.');
        }
    }

    public function charts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $datefrom = $data['datefrom'];
            $dateto = $data['dateto'];
            
            $total_users_count = User::count();
            $users = User::whereBetween('created_at', [$datefrom, $dateto])->get();
            $users_count = User::whereBetween('created_at', [$datefrom, $dateto])->count();

            $total_orders_count = Order::count();
            $orders = Order::whereBetween('created_at', [$datefrom, $dateto])->get();
            $orders_count = Order::whereBetween('created_at', [$datefrom, $dateto])->count();

            $total_sale = Order::where(['order_status'=>"Paid"])->sum('grand_total');
            $sale = Order::where('order_status','Paid')
                    ->whereBetween('created_at', [$datefrom, $dateto])
                    ->sum('grand_total');

            // $sale = json_decode(json_encode($sale));
            // echo "<pre>"; print_r($sale); die;
            // dd($total_users_count);

            return view('admin.charts')->with(compact('datefrom','dateto','users','total_users_count','users_count','orders','total_orders_count','orders_count','sale','total_sale'));
        }
    }
}