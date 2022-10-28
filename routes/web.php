<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalldecalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VectorController;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\FontController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\BabycardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::get('/home', [WebController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'],function () {
Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');

});

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('/Lollipop', function (){ return view ('index-2'); });
Route::get('/Wedding', function (){ return view ('index-3'); });
Route::get('/Coffee', function (){ return view ('index-4'); });
Route::get('/Ice-Cream', function (){ return view ('index-5'); });
Route::get('/Macaron', function (){ return view ('index-6'); });
Route::get('/Shop', function (){ return view ('index-7'); });
Route::get('/Landing', function (){ return view ('index-8'); });


Route::get('/about-us', function (){ return view ('about-us'); });
Route::get('/our-staff', function (){ return view ('our-staff'); });
Route::get('/pricing-tables', function (){ return view ('pricing-tables'); });
Route::get('/content-elements', function (){ return view ('content-elements'); });
Route::get('/recipes-list', function (){ return view ('recipes-list'); });


Route::get('/portfolio-masonry', function (){ return view ('portfolio-masonry'); });
Route::get('/portfolio-masonry-wide', function (){ return view ('portfolio-masonry-wide'); });
Route::get('/portfolio-wide', function (){ return view ('portfolio-wide'); });
Route::get('/portfolio-with-filter', function (){ return view ('portfolio-with-filter'); });
Route::get('/portfolio-two-column', function (){ return view ('portfolio-two-column'); });
Route::get('/portfolio-with-sidebar', function (){ return view ('portfolio-with-sidebar'); });
Route::get('/portfolio-square', function (){ return view ('portfolio-square'); });
Route::get('/portfolio-single', function (){ return view ('portfolio-single'); });

Route::get('/blog-showcase', function (){ return view ('blog-showcase'); });
Route::get('/blog-standard', function (){ return view ('blog-standard'); });
Route::get('/blog-masonry', function (){ return view ('blog-masonry'); });
Route::get('/blog-masonry-full-width', function (){ return view ('blog-masonry-full-width'); });
Route::get('/blog-two-column', function (){ return view ('blog-two-column'); });
Route::get('/blog-three-column-wide', function (){ return view ('blog-three-column-wide'); });
Route::get('/blog-single', function (){ return view ('blog-single'); });
Route::get('/blog-single-2', function (){ return view ('blog-single-2'); });
Route::get('/blog-single-3', function (){ return view ('blog-single-3'); });
Route::get('/blog-single-4', function (){ return view ('blog-single-4'); });
Route::get('/blog-single-5', function (){ return view ('blog-single-5'); });


Route::get('/shop', function (){ return view ('shop'); });
Route::get('/shopping-cart', function (){ return view ('shopping-cart'); });
Route::get('/checkout', function (){ return view ('checkout'); });
Route::get('/login', function (){ return view ('login'); });
Route::get('/contact', function (){ return view ('contact'); });

Route::resource('cart', CartController::class);
Route::get('/getcart', [CartController::class, 'getcart'])->name('getcart');
Route::get('/deletecart', [CartController::class, 'deletecart'])->name('deletecart');

Route::get('/deletecart/{id}', [CartController::class, 'delete_cart']);
Route::get('state-list/', [WebController::class, 'stateList'])->name('state-list');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::group(['prefix' => '/admin','middleware' => 'auth'],function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::resource('walldecal', WalldecalController::class);
    Route::get('walldecal-List/', [WalldecalController::class, 'walldecalList'])->name('walldecal-list');
    
    Route::resource('vector', VectorController::class);
    Route::get('vector-List/', [VectorController::class, 'vectorList'])->name('vector-list');

    Route::resource('wallpaper', WallpaperController::class);
    Route::get('wallpaper-List/', [WallpaperController::class, 'wallpaperList'])->name('wallpaper-list');

    Route::resource('font', FontController::class);
    Route::get('font-List/', [FontController::class, 'fontList'])->name('font-list');


    Route::resource('print', PrintController::class);
    Route::get('print-List/', [PrintController::class, 'printList'])->name('print-list');

    Route::resource('babycard', BabycardController::class);
    Route::get('babycard-List/', [BabycardController::class, 'babycardList'])->name('babycard-list');

    Route::post('/orderplace', [OrderController::class, 'orderplace'])->name('orderplace');
     Route::get('order/', [OrderController::class, 'order'])->name('order');
   Route::get('order-List/', [OrderController::class, 'orderList'])->name('order-list');
   Route::get('order-show/{id}', [OrderController::class, 'show'])->name('order-show');
   
    Route::resource('user', UserController::class);
   
    Route::get('user-List/', [UserController::class, 'userList'])->name('user-list');

});