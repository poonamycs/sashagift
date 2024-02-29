<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;


Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');
    return "cache cleared";
});
Auth::routes();
Route::group(['middleware' => ['adminlogin']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

	//Categories Routes (Admin)
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::get('/admin/view-categories','CategoryController@viewCategories');

	// Products Routes (Admin)
	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::match(['get','post'],'/admin/edit-product/{pid}','ProductsController@editProduct');
	Route::get('/admin/delete-product/{pid}','ProductsController@deleteProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/view-all-products','ProductsController@viewAdminProducts');

	Route::match(['get','post'],'admin/product-approved/{id}','ProductsController@productApproved');
	Route::match(['get','post'],'admin/product-not-approved/','ProductsController@productsNotApproved');
	// export products
	Route::get('/admin/export-products/','ProductsController@exportProducts');

	// Products Attributes and images (Admin)
	Route::match(['get','post'],'admin/add-attributes/{pid}','ProductsController@addAttributes');
	Route::match(['get','post'],'admin/edit-attributes/{pid}','ProductsController@editAttributes');
	Route::match(['get','post'], '/admin/add-images/{pid}','ProductsController@addImages');
	Route::match(['get','post'],'/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');
	Route::match(['get','post'],'/admin/delete-attributes/{id}','ProductsController@deleteAttribute');

	// Banner Routes(Admin)
	Route::match(['get','post'],'/admin/add-banner/','BannersController@addBanner');
	Route::match(['get','post'],'/admin/edit-banner/{eid}','BannersController@editBanner');
	Route::match(['get','post'],'/admin/delete-banner/{eid}','BannersController@deleteBanner');
	Route::match(['get','post'],'/admin/view-banners/','BannersController@viewBanners');

	// offer Banner Routes(Admin)
	Route::match(['get','post'],'/admin/add-offer-banner/','BannersController@addOfferBanner');
	Route::match(['get','post'],'/admin/edit-offer-banner/{eid}','BannersController@editOfferBanner');
	Route::match(['get','post'],'/admin/delete-offer-banner/{eid}','BannersController@deleteOfferBanner');
	Route::match(['get','post'],'/admin/view-offer-banners/','BannersController@viewOfferBanners');

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
	Route::match(['get','post'],'/admin/view-users/','UsersController@viewUsers');
	Route::match(['get','post'],'/admin/view-users-charts/','UsersController@viewUserscharts');

	//view vendors
	Route::match(['get','post'],'admin/view-vendors/','AdminController@viewVendors');

	// Export users
	Route::get('/admin/export-users/','UsersController@exportUsers');

	// add cms page route
	Route::match(['get','post'],'/admin/add-cms-page','CmsController@addCmsPage');
	Route::match(['get','post'],'/admin/view-cms-pages','CmsController@viewCmsPages');
	Route::match(['get','post'],'/admin/edit-cms-page/{id}','CmsController@editCmsPage');
	Route::match(['get','post'],'/admin/delete-cms-page/{id}','CmsController@deleteCmsPage');

	// admin testimonial section
	Route::match(['get','post'],'/admin/add-testimonial','TestimonialsController@addTestimonial');
	Route::match(['get','post'],'/admin/view-testimonials','TestimonialsController@viewTestimonials');
	Route::match(['get','post'],'/admin/edit-testimonial/{id}','TestimonialsController@editTestimonial');
	Route::match(['get','post'],'/admin/delete-testimonial/{id}','TestimonialsController@deleteTestimonial');

	// gallery admin section
	Route::match(['get','post'],'/admin/add-gallery','GalleryController@addImages');
	Route::match(['get','post'],'/admin/view-gallery','GalleryController@viewImages');
	Route::match(['get','post'],'/admin/edit-gallery/{id}','GalleryController@editImage');
	Route::match(['get','post'],'/admin/delete-gallery/{id}','GalleryController@deleteImage');

	// view enquiries/feedback
	Route::match(['get','post'],'/admin/view-enquiries/','UsersController@viewEnquiries');
	Route::match(['get','post'],'/admin/delete-enquiry/{id}','UsersController@deleteEnquiry');

	// view customer order history
	Route::match(['get','post'],'/admin/view-user-orders/{email}','UsersController@viewUserOrders');
	// change customer order status
	Route::match(['get','post'],'admin/update-status/{id}','AdminController@updateStatus');

	//view shipping charges
	Route::match(['get','post'],'admin/add-pincode/','ShippingController@addPincode');
	Route::get('admin/view-shipping/','ShippingController@viewShipping');
	Route::match(['get','post'],'admin/edit-shipping/{id}','ShippingController@editShipping');
	Route::match(['get','post'],'admin/delete-shipping/{id}','ShippingController@deleteShipping');

	Route::get('admin/view-search-history','AdminController@viewSearchHistory');

	Route::match(['get','post'], 'admin/add-vendor/','AdminController@addVendor');
	Route::match(['get','post'], 'admin/view-vendor-stocks/{id}','StockController@viewVendorStocks');

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
	Route::match(['get','post'],'admin/contact-details/','CmsController@contactDetails');
	Route::match(['get','post'],'admin/edit-contact-details/{id}','CmsController@editcontactDetails');
});

Route::get('/logout','AdminController@logout');