<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GiftcardController;
/*
/*
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


Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth'], function () {
   Route::get('/myaccount', [WebController::class, 'myorder'])->name('myorder');
});

Route::get('/home', [WebController::class, 'index'])->name('home');
// Route::get('/viewdd', [WebController::class, 'viewdd'])->name('viewdd');

Route::get('/blog', [WebController::class, 'blog']);
Route::get('/blog-single/{id}', [WebController::class, 'blogDetails']);

Route::get('/about-us', [WebController::class, 'about']);
Route::get('/shop', [WebController::class, 'shop']);
Route::get('/product/{id}', [WebController::class, 'product']);

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/inovice/{id}', [WebController::class, 'inovice'])->name('inovice');

Route::get('/Lollipop', function (){ return view ('index-2'); });
Route::get('/Wedding', function (){ return view ('index-3'); });
Route::get('/Coffee', function (){ return view ('index-4'); });
Route::get('/Ice-Cream', function (){ return view ('index-5'); });
Route::get('/Macaron', function (){ return view ('index-6'); });
Route::get('/Landing', function (){ return view ('index-8'); });


Route::get('/about-us', function (){ return view ('about-us'); });
Route::get('/our-staff', function (){ return view ('our-staff'); });
Route::get('/pricing-tables', function (){ return view ('pricing-tables'); });
Route::get('/content-elements', function (){ return view ('content-elements'); });
Route::get('/recipes-list', function (){ return view ('recipes-list'); });


Route::get('/contact', function (){ return view ('contact'); });

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cartstore', [CartController::class, 'store'])->name('cart.store');
Route::get('/getcart', [CartController::class, 'getcart'])->name('getcart');
Route::get('/getcart2', [CartController::class, 'getcart2'])->name('getcart2');
Route::get('/deletecart', [CartController::class, 'deletecart'])->name('deletecart');
Route::get('/qtyupdate', [CartController::class, 'qtyupdate'])->name('qtyupdate');
Route::get('/couponapply', [CartController::class, 'couponapply'])->name('couponapply');

Route::get('/deletecart/{id}', [CartController::class, 'delete_cart']);
Route::get('state-list/', [WebController::class, 'stateList'])->name('state-list');
Route::get('city-list/', [WebController::class, 'cityList'])->name('city-list');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::resource('review', ReviewController::class);



Route::group(['prefix' => '/admin','middleware' => 'auth'],function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
   
    Route::resource('blog', BlogController::class);
    Route::get('blog-List/', [BlogController::class, 'blogList'])->name('blog-list');
    
    Route::resource('category', CategoryController::class);
    Route::get('category-List/', [CategoryController::class, 'categoryList'])->name('category-list');

    Route::resource('product', ProductController::class);
    Route::get('product-List/', [ProductController::class, 'productList'])->name('product-list');

    Route::post('/orderplace', [OrderController::class, 'orderplace'])->name('orderplace');
    Route::get('order/', [OrderController::class, 'order'])->name('order');
    Route::get('order-List/', [OrderController::class, 'orderList'])->name('order-list');
    Route::get('order-show/{id}', [OrderController::class, 'show'])->name('order-show');
    Route::post('/orderstatus', [OrderController::class, 'orderstatus'])->name('orderstatus');

    
   
   
    Route::resource('user', UserController::class);
   
    Route::get('user-List/', [UserController::class, 'userList'])->name('user-list');
    
    Route::resource('giftcard', GiftcardController::class);
    Route::get('giftcard-List/', [GiftcardController::class, 'giftcardList'])->name('giftcard-list');
});