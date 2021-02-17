<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\ProductAttributesController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCouponController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminOrderController;

//frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;


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

Route::get('/admin', function () {
    return view('admin.home');
});
//trang login
Route::get('/admin/login', [AdminLoginController::class, 'loginAdmin']);
Route::post('/admin/login', [AdminLoginController::class, 'postLoginAdmin']);

//user register,login
Route::get('/login_page',[UserController::class,'index']) -> name('user.login');
Route::post('/login',[UserController::class,'login']) -> name('user.login.post');
Route::post('/register',[UserController::class,'register']) -> name('user.register');
Route::get('/logout',[UserController::class,'logout']) -> name('user.logout');

///// Cart Area /////////
Route::post('/addToCart',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/view-cart',[CartController::class,'index']) -> name('cart.view');
Route::get('/update-cart/{id}/{quantity}',[CartController::class,'updateQuantity']) -> name('cart.update');
Route::get('/delete-cart-item/{id}',[CartController::class,'deleteItem']) -> name('cart.delete');
/// Apply Coupon Code
Route::post('/apply-coupon',[AdminCouponController::class,'applyCoupon']) -> name('apply.coupon');




////// User Authentications ///////////
Route::group(['middleware'=>'FrontLoginMiddleware'],function (){
    Route::get('/my-account',[UserController::class,'myAccount']) -> name('user.account');
    Route::put('/update-profile/{id}',[UserController::class,'updateProfile'])-> name('updateProfile');
    Route::put('/update-password/{id}',[UserController::class,'updatePassword']) -> name('updatePassword');
    Route::get('/check-out',[CheckOutController::class,'index']) -> name('checkout');
    Route::post('/check-out',[CheckOutController::class,'submitCheckout']) -> name('checkout.submit');
    Route::get('/order-review',[OrderController::class,'index']) -> name('order.review');
    Route::post('/order-submit',[OrderController::class,'order']) -> name('order.submit');
    Route::get('/cod',[OrderController::class,'cod']) -> name('cod');
    Route::get('/paypal',[OrderController::class,'paypal']) -> name('paypal');
   
   
});


//frontend
Route::get('/',[HomeController::class,'home']) -> name('home');
Route::get('/category/{slug}/{id}',[FrontCategoryController::class,'index']) -> name('category.product');
Route::get('/product/{slug}/{id}',[FrontCategoryController::class,'productDetail']) -> name('product.detail');
Route::get('get-product-attr',[FrontCategoryController::class,'getAttrs']);
Route::post('reviews-store',[ReviewController::class,'store']) -> name('reviews.store');
//end frontend

// Group route for admin
Route::prefix('admin') -> group(function(){

	//danh cho review
	Route::prefix('reviews') -> group(function(){

		Route::get('/',[ReviewController::class,'index']) -> name('review.index');
		//xoa review
		Route::get('/delete/{id}',[ReviewController::class,'delete'])-> name('review.delete');

	});
	
	
	// group route for order
	Route::prefix('orders') -> group(function(){

		//liet ke danh sach danh muc order
		Route::get('/',[AdminOrderController::class,'index']) -> name('order.index');
		
		//sưa danh muc san pham
		Route::get('/edit/{id}',[AdminOrderController::class,'edit']) -> name('order.edit');
		Route::get('/update-note',[AdminOrderController::class,'updateNote']) -> name('order.update.note');
		//cap nhat tinh trang dơn hang trong admin
		Route::get('/update-confirm',[AdminOrderController::class,'updateConfirm']) -> name('order.update.confirm');
		//cap nhat tinh trang thang toan dơn hang trong admin
		Route::get('/update-payment',[AdminOrderController::class,'updatePayment']) -> name('order.update.payment');
		//xoa danh muc san pham
		Route::get('/delete/{id}',[AdminOrderController::class,'delete'])-> name('order.delete');

	});

	// group route for categories
	Route::prefix('categories') -> group(function(){

		//liet ke danh sach danh muc san pham
		Route::get('/',[CategoryController::class,'index']) -> name('categories.index') -> middleware('can:category-list');
		//them danh muc san pham
		Route::get('/create',[CategoryController::class,'create']) -> name('categories.create') -> middleware('can:category-add');
		Route::post('/store',[CategoryController::class,'store']) -> name('categories.store');
		//sưa danh muc san pham
		Route::get('/edit/{id}',[CategoryController::class,'edit']) -> name('categories.edit') -> middleware('can:category-edit');
		Route::post('/update/{id}',[CategoryController::class,'update']) -> name('categories.update');
		//xoa danh muc san pham
		Route::get('/delete/{id}',[CategoryController::class,'delete'])-> name('categories.delete') -> middleware('can:category-delete');

	});

	//group route for menu
	Route::prefix('menus') -> group(function(){

		//liet ke menu
		Route::get('/',[MenuController::class,'index']) -> name('menu.index') -> middleware('can:menu-list');
		
		//them moi menu
		Route::get('/create',[MenuController::class,'create']) -> name('menu.create');
		Route::post('/store',[MenuController::class,'store']) -> name('menu.store');

		//sua menu
		Route::get('/edit/{id}',[MenuController::class,'edit']) -> name('menu.edit');
		Route::post('/update/{id}',[MenuController::class,'update']) -> name('menu.update');
		
		//xoa menu
		Route::get('delete/{id}',[MenuController::class,'delete']) -> name('menu.delete');

	});

		//group route for brand
	Route::prefix('brands') -> group(function(){

		//liet ke brand
		Route::get('/',[AdminBrandController::class,'index']) -> name('brand.index');
		
		//them moi brand
		Route::get('/create',[AdminBrandController::class,'create']) -> name('brand.create');
		Route::post('/store',[AdminBrandController::class,'store']) -> name('brand.store');

		//sua brand
		Route::get('/edit/{id}',[AdminBrandController::class,'edit']) -> name('brand.edit');
		Route::post('/update/{id}',[AdminBrandController::class,'update']) -> name('brand.update');
		
		//xoa brand
		Route::get('delete/{id}',[AdminBrandController::class,'delete']) -> name('brand.delete');

	});

	//group for setting
	Route::prefix('settings') -> group(function(){
		//liet ke seting
		Route::get('/',[SettingController::class,'index']) -> name('setting.index');
		//them moi setting
		Route::get('add',[SettingController::class,'create']) -> name('setting.add');
		Route::post('store',[SettingController::class,'store']) -> name('setting.store');

		//chinh sua setting
		Route::get('edit/{id}',[SettingController::class,'edit']) -> name('setting.edit');
		Route::post('update/{id}',[SettingController::class,'update']) -> name('setting.update');

		//xoa setting
		Route::get('delete/{id}',[SettingController::class,'delete']) -> name('setting.delete');

	});

	//group for slider
	Route::prefix('sliders') -> group(function(){
		Route::get('/',[SliderController::class,'index']) -> name('slider.index');
		//them slider
		Route::get('add',[SliderController::class,'add']) -> name('slider.add');
		Route::post('store',[SliderController::class,'store']) -> name('slider.store');
		//sua slider
		Route::get('edit/{id}',[SliderController::class,'edit']) -> name('slider.edit');
		Route::post('update/{id}',[SliderController::class,'update']) -> name('slider.update');
		//xoa slider
		Route::get('delete/{id}',[SliderController::class,'delete']) -> name('slider.delete');
	});

	//group for product

	Route::prefix('products') -> group(function(){
		//liet ke product
		Route::get('/',[AdminProductController::class,'index']) -> name('product.index');
		//them product
		Route::get('add',[AdminProductController::class,'add']) -> name('product.add');
		Route::post('store',[AdminProductController::class,'store']) -> name('product.store');
		//sua product
		//truyen id den middlewarde de biet bai viet id la may de lay ra user_id bai viet do
		Route::get('edit/{id}',[AdminProductController::class,'edit']) -> name('product.edit') -> middleware('can:product-edit,id');
		Route::post('update/{id}',[AdminProductController::class,'update']) -> name('product.update');

		//xoa product
		Route::get('delete/{id}',[AdminProductController::class,'delete']) -> name('product.delete');

	});

	Route::prefix('image-gallery') -> group(function(){
		Route::get('add/{id}',[ImageGalleryController::class,'add']) -> name('image-gallery.add');
		Route::post('store',[ImageGalleryController::class,'store']) -> name('image-gallery.store');
		//xoa image

		Route::get('delete/{id}',[ImageGalleryController::class,'delete']) -> name('image-gallery.delete');
	});

	Route::prefix('product-attr') -> group(function(){
		Route::get('add/{id}',[ProductAttributesController::class,'add']) -> name('product-attr.add');
		Route::post('store',[ProductAttributesController::class,'store']) -> name('product-attr.store');
		//update attributes
		Route::get('/update',[ProductAttributesController::class,'update']);
		//xoa image
		Route::get('delete/{id}',[ProductAttributesController::class,'delete']) -> name('product-attr.delete');
	});

	//group for coupon

	Route::prefix('coupons') -> group(function(){
		//liet ke product
		Route::get('/',[AdminCouponController::class,'index']) -> name('coupon.index');
		//them product
		Route::get('add',[AdminCouponController::class,'add']) -> name('coupon.add');
		Route::post('store',[AdminCouponController::class,'store']) -> name('coupon.store');
		//sua product
		//truyen id den middlewarde de biet bai viet id la may de lay ra user_id bai viet do
		Route::get('edit/{id}',[AdminCouponController::class,'edit']) -> name('coupon.edit');
		Route::post('update/{id}',[AdminCouponController::class,'update']) -> name('coupon.update');

		//xoa product
		Route::get('delete/{id}',[AdminCouponController::class,'delete']) -> name('coupon.delete');

	});

	//route for users
	Route::prefix('users') -> group(function(){
		//liet ke user
		Route::get('/',[AdminUserController::class,'index']) -> name('user.index');
		//them user
		Route::get('/add',[AdminUserController::class,'add']) -> name('user.add');
		Route::post('/store',[AdminUserController::class,'store']) -> name('user.store');
		
		//chinh sua user
		Route::get('/edit/{id}',[AdminUserController::class,'edit']) -> name('user.edit');
		Route::post('/update/{id}',[AdminUserController::class,'update']) -> name('user.update');

		//xoa user
		Route::get('/delete/{id}',[AdminUserController::class,'delete']) -> name('user.delete');
	});
	//route for permissions
	Route::prefix('permissions') -> group(function(){
		//liet ke permission
		Route::get('/',[AdminPermissionController::class,'index']) -> name('permission.index');
		//create
		Route::get('/add',[AdminPermissionController::class, 'addPermissions']) -> name('permission.add');
		Route::post('/store',[AdminPermissionController::class, 'storePermissions']) -> name('permission.store');
		//chinh sửa 
		Route::get('/edit/{id}',[AdminPermissionController::class,'edit']) -> name('permission.edit');
		Route::post('/update/{id}',[AdminPermissionController::class,'update']) -> name('permission.update');
		//xoa
		Route::get('/delete/{id}',[AdminPermissionController::class,'delete']) -> name('permission.delete');
	});

	//route for roles
	Route::prefix('roles') -> group(function(){
		//liệt kê roles
		Route::get('/',[AdMinRoleController::class,'index']) -> name('role.index');
		//create role
		Route::get('/add',[AdMinRoleController::class, 'add']) -> name('role.add');
		Route::post('/store',[AdMinRoleController::class, 'store']) -> name('role.store');
		
		//edit role
		Route::get('/edit/{id}',[AdMinRoleController::class,'edit']) ->name('role.edit');
		Route::post('/update/{id}',[AdMinRoleController::class,'update']) -> name('role.update');
		//xoa role
		Route::get('/delete/{id}',[AdMinRoleController::class,'delete']) -> name('role.delete');

	});



});
