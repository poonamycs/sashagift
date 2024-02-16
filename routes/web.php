<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');
    return "cache cleared";
});


Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/about', [IndexController::class, 'about'])->name('about');

Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::Post('/contact/store',[IndexController::class, 'store'])->name('contact.store');

Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog_detail/{id?}', [IndexController::class, 'blog_detail'])->name('blog_detail');

Route::get('/product_list/{id?}', [IndexController::class, 'product_list'])->name('product_list');
Route::get('/product_detail/{id?}', [IndexController::class, 'product_detail'])->name('product_detail');

Route::get('/nuhas', [IndexController::class, 'nuhas'])->name('nuhas');
Route::get('/nuhas_detail/{id?}', [IndexController::class, 'nuhas_detail'])->name('nuhas_detail');

Route::get('/vender_product_listing', [IndexController::class, 'vender_plisting'])->name('vender_plisting');


Route::match(['get','post'],'/user_login',[App\Http\Controllers\IndexController::class, 'user_login']);
Route::match(['get','post'], 'user/logout', [App\Http\Controllers\IndexController::class, 'userLogout']);
// Route::get('/user_login', [IndexController::class, 'user_login'])->name('user_login');
// Route::Post('/login', [IndexController::class, 'login'])->name('login');
Auth::routes();
//Admin login
Route::match(['get','post'],'/admin',[App\Http\Controllers\AdminController::class, 'login']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['admin']],function(){
	Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'dashboard']);
	Route::get('/admin/settings',[App\Http\Controllers\AdminController::class, 'settings']);
	Route::get('/admin/check-pwd',[App\Http\Controllers\AdminController::class, 'chkPassword']);
	Route::match(['get','post'],'/admin/update-pwd',[App\Http\Controllers\AdminController::class, 'updatePassword']);

	//Categories Routes (Admin)
	Route::match(['get','post'],'/admin/add-category',[App\Http\Controllers\CategoryController::class, 'addCategory']);
	Route::match(['get','post'],'/admin/edit-category/{id}',[App\Http\Controllers\CategoryController::class, 'editCategory']);
	Route::match(['get','post'],'/admin/delete-category/{id}',[App\Http\Controllers\CategoryController::class, 'deleteCategory']);
	Route::get('/admin/view-categories',[App\Http\Controllers\CategoryController::class, 'viewCategories']);

	// Products Routes (Admin)
	Route::match(['get','post'],'/admin/add-product',[App\Http\Controllers\ProductsController::class, 'addProduct']);
	Route::match(['get','post'],'/admin/delete-product-image/{id}',[App\Http\Controllers\ProductsController::class, 'deleteProductImage']);
	Route::match(['get','post'],'/admin/edit-product/{pid}',[App\Http\Controllers\ProductsController::class, 'editProduct']);
	Route::get('/admin/delete-product/{pid}',[App\Http\Controllers\ProductsController::class, 'deleteProduct']);
	Route::get('/admin/view-products',[App\Http\Controllers\ProductsController::class, 'viewProducts']);
	Route::get('/admin/view-all-products',[App\Http\Controllers\ProductsController::class, 'viewAdminProducts']);

	Route::match(['get','post'],'admin/product-approved/{id}',[App\Http\Controllers\ProductsController::class, 'productApproved']);
	Route::match(['get','post'],'admin/product-not-approved/',[App\Http\Controllers\ProductsController::class, 'productsNotApproved']);
	// export products
	Route::get('/admin/export-products/','ProductsController@exportProducts');

	// Products Attributes and images (Admin)
	Route::match(['get','post'],'admin/add-attributes/{pid}',[App\Http\Controllers\ProductsController::class, 'addAttributes']);
	Route::match(['get','post'],'admin/edit-attributes/{pid}',[App\Http\Controllers\ProductsController::class, 'editAttributes']);
	Route::match(['get','post'], '/admin/add-images/{pid}',[App\Http\Controllers\ProductsController::class, 'addImages']);
	Route::match(['get','post'],'/admin/delete-alt-image/{id}',[App\Http\Controllers\ProductsController::class, 'deleteAltImage']);
	Route::match(['get','post'],'/admin/delete-attributes/{id}',[App\Http\Controllers\ProductsController::class, 'deleteAttribute']);

	// Banner Routes(Admin)
	Route::match(['get','post'],'/admin/add-banner/',[App\Http\Controllers\BannersController::class, 'addBanner']);
	Route::match(['get','post'],'/admin/edit-banner/{eid}',[App\Http\Controllers\BannersController::class, 'editBanner']);
	Route::match(['get','post'],'/admin/delete-banner/{eid}',[App\Http\Controllers\BannersController::class, 'deleteBanner']);
	Route::match(['get','post'],'/admin/view-banners/',[App\Http\Controllers\BannersController::class, 'viewBanners']);

	// offer Banner Routes(Admin)
	Route::match(['get','post'],'/admin/add-offer-banner/',[App\Http\Controllers\BannersController::class, 'addOfferBanner']);
	Route::match(['get','post'],'/admin/edit-offer-banner/{eid}',[App\Http\Controllers\BannersController::class, 'editOfferBanner']);
	Route::match(['get','post'],'/admin/delete-offer-banner/{eid}',[App\Http\Controllers\BannersController::class, 'deleteOfferBanner']);
	Route::match(['get','post'],'/admin/view-offer-banners/',[App\Http\Controllers\BannersController::class, 'viewOfferBanners']);

	// Admin Orders Routes
	Route::match(['get','post'],'/admin/view-all-orders/','ProductsController@viewOrders');
	Route::match(['get','post'],'/admin/view-vendor-orders/','ProductsController@viewVendorOrders');
	Route::get('/admin/view-orders-charts/','ProductsController@viewOrdersCharts');
	Route::match(['get','post'],'/admin/view-order/{id}','ProductsController@viewOrderDetails');
	Route::match(['get','post'],'/admin/update-order-status/','ProductsController@updateOrderStatus');
	// allocate order to vendor
	Route::match(['get','post'],'admin/allocate-order/{id}','ProductsController@allocateOrder');
	// Order Invoice
	Route::match(['get','post'],'/admin/view-order-invoice/{id}','ProductsController@viewOrderInvoice');
	// Order PDF Invoice
	Route::match(['get','post'],'/admin/view-pdf-invoice/{id}','ProductsController@viewPDFInvoice');
	// Export orders
	Route::get('/admin/export-orders/','ProductsController@exportOrders');
	// view delivered & paid orders
	Route::match(['get','post'],'/admin/view-delivered-orders/','ProductsController@viewDeliveredOrders');
	Route::match(['get','post'],'/admin/view-cancel-orders/','ProductsController@viewCancelOrders');
	Route::match(['get','post'],'/admin/view-new-orders/','ProductsController@viewNewOrders');
	Route::match(['get','post'],'/admin/view-pending-orders/','ProductsController@viewPendingOrders');
	Route::match(['get','post'],'/admin/view-shipped-orders/','ProductsController@viewShippedOrders');

	// view registered users
	Route::match(['get','post'],'/admin/view-users/',[App\Http\Controllers\UsersController::class, 'viewUsers']);
	Route::match(['get','post'],'/admin/view-users-charts/',[App\Http\Controllers\UsersController::class, 'viewUserscharts']);

	//view vendors
	Route::match(['get','post'],'admin/view-vendors/',[App\Http\Controllers\AdminController::class, 'viewVendors']);
	Route::match(['get','post'],'admin/add-vendor-product/',[App\Http\Controllers\AdminController::class, 'addVendorProduct']);
	Route::match(['get','post'],'admin/vendor-approved/{id}',[App\Http\Controllers\AdminController::class, 'vendorApproved']);

	Route::match(['get','post'],'admin/vendor-product/{id}',[App\Http\Controllers\AdminController::class, 'productVendors']);
	Route::match(['get','post'],'/admin/delete-vendor-product/{id}',[App\Http\Controllers\AdminController::class, 'deleteproductVendors']);
	// Export users
	Route::get('/admin/export-users/',[App\Http\Controllers\UsersController::class, 'exportUsers']);

	// add cms page route
	Route::match(['get','post'],'/admin/add-cms-page',[App\Http\Controllers\CmsController::class, 'addCmsPage']);
	Route::match(['get','post'],'/admin/view-cms-pages',[App\Http\Controllers\CmsController::class, 'viewCmsPages']);
	Route::match(['get','post'],'/admin/edit-cms-page/{id}',[App\Http\Controllers\CmsController::class, 'editCmsPage']);
	Route::match(['get','post'],'/admin/delete-cms-page/{id}',[App\Http\Controllers\CmsController::class, 'deleteCmsPage']);

	// admin testimonial section
	Route::match(['get','post'],'/admin/add-testimonial',[App\Http\Controllers\TestimonialsController::class, 'addTestimonial']);
	Route::match(['get','post'],'/admin/view-testimonials',[App\Http\Controllers\TestimonialsController::class, 'viewTestimonials']);
	Route::match(['get','post'],'/admin/edit-testimonial/{id}',[App\Http\Controllers\TestimonialsController::class, 'editTestimonial']);
	Route::match(['get','post'],'/admin/delete-testimonial/{id}',[App\Http\Controllers\TestimonialsController::class, 'deleteTestimonial']);

	// admin testimonial section
	Route::match(['get','post'],'/admin/add-blog',[App\Http\Controllers\BlogController::class, 'addBlog']);
	Route::match(['get','post'],'/admin/view-blogs',[App\Http\Controllers\BlogController::class, 'viewBlog']);
	Route::match(['get','post'],'/admin/edit-blog/{id}',[App\Http\Controllers\BlogController::class, 'editBlog']);
	Route::match(['get','post'],'/admin/delete-blog/{id}',[App\Http\Controllers\BlogController::class, 'deleteBlog']);

	// gallery admin section
	Route::match(['get','post'],'/admin/add-gallery','GalleryController@addImages');
	Route::match(['get','post'],'/admin/view-gallery','GalleryController@viewImages');
	Route::match(['get','post'],'/admin/edit-gallery/{id}','GalleryController@editImage');
	Route::match(['get','post'],'/admin/delete-gallery/{id}','GalleryController@deleteImage');

	// view enquiries/feedback
	Route::match(['get','post'],'/admin/view-enquiries/',[App\Http\Controllers\UsersController::class, 'viewEnquiries']);
	Route::match(['get','post'],'/admin/delete-enquiry/{id}',[App\Http\Controllers\UsersController::class, 'deleteEnquiry']);

	// view about
	Route::match(['get','post'],'/admin/about/',[App\Http\Controllers\AdminController::class, 'about']);
	Route::match(['get','post'],'/admin/delete-about-image/{id}',[App\Http\Controllers\AdminController::class, 'deleteAboutImage']);
	
	// view trusted by
	Route::match(['get','post'],'/admin/add-trustedby',[App\Http\Controllers\TrustedController::class, 'addTrustedby']);
	Route::match(['get','post'],'/admin/view-trustedby',[App\Http\Controllers\TrustedController::class, 'viewTrustedby']);
	Route::match(['get','post'],'/admin/edit-trustedby/{id}',[App\Http\Controllers\TrustedController::class, 'editTrustedby']);
	Route::match(['get','post'],'/admin/delete-trustedby/{id}',[App\Http\Controllers\TrustedController::class, 'deleteTrustedby']);

	// view brands
	Route::match(['get','post'],'/admin/add-brand',[App\Http\Controllers\BrandController::class, 'addBrand']);
	Route::match(['get','post'],'/admin/view-brands',[App\Http\Controllers\BrandController::class, 'viewBrand']);
	Route::match(['get','post'],'/admin/edit-brand/{id}',[App\Http\Controllers\BrandController::class, 'editBrand']);
	Route::match(['get','post'],'/admin/delete-brand/{id}',[App\Http\Controllers\BrandController::class, 'deleteBrand']);

	// view customer order history
	Route::match(['get','post'],'/admin/view-user-orders/{email}','UsersController@viewUserOrders');
	// change customer order status
	Route::match(['get','post'],'admin/update-status/{id}',[App\Http\Controllers\AdminController::class, 'updateStatus']);

	//view shipping charges
	Route::match(['get','post'],'admin/add-pincode/','ShippingController@addPincode');
	Route::get('admin/view-shipping/','ShippingController@viewShipping');
	Route::match(['get','post'],'admin/edit-shipping/{id}','ShippingController@editShipping');
	Route::match(['get','post'],'admin/delete-shipping/{id}','ShippingController@deleteShipping');

	Route::get('admin/view-search-history',[App\Http\Controllers\AdminController::class, 'viewSearchHistory']);

	Route::match(['get','post'], 'admin/add-vendor/',[App\Http\Controllers\AdminController::class, 'addVendor']);
	Route::match(['get','post'], 'admin/view-vendor-stocks/{id}',[App\Http\Controllers\StockController::class, 'viewVendorStocks']);

	// stock management
	Route::match(['get','post'], 'admin/stock-category/', 'StockController@stockCategory');
	Route::match(['get','post'], 'admin/delete-stock-category/{id}', 'StockController@deleteCategory');
	Route::match(['get','post'], 'admin/edit-stock-category/{id}', 'StockController@editCategory');

	Route::match(['get','post'], 'admin/add-stock-item', 'StockController@addItem');
	Route::match(['get','post'], 'admin/view-stock-items', 'StockController@viewStockItems');
	Route::match(['get','post'],'admin/delete-item/{id}','StockController@deleteItem');
	Route::match(['get','post'],'admin/edit-stock-item/{id}','StockController@editItem');
	Route::match(['get','post'],'admin/add-vendor-items/{id}','StockController@addVendorItems');
	Route::match(['get','post'],'admin/stock-distribution/','StockController@vendorDistribution');
	Route::get('/admin/export-stock-items/','StockController@exportStockItems');
	Route::get('/get-item-quantity','StockController@getItemQuantity');
	Route::match(['get','post'],'admin/stock-distribution/{id}','StockController@editVendorStockItem');
	Route::match(['get','post'],'admin/delete-vendor-stock-item/{id}','StockController@deleteVendorStockItem');
	Route::match(['get','post'],'admin/view-single-vendor-stock','StockController@viewSingleVendorStock');

	Route::match(['get','post'],'admin/chart','ProductsController@charts');
	Route::match(['get','post'],'admin/contact-details/',[App\Http\Controllers\CmsController::class, 'contactDetails']);
	Route::match(['get','post'],'admin/edit-contact-details/{id}',[App\Http\Controllers\CmsController::class, 'editcontactDetails']);
});


