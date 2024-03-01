<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\OrderController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shopping-cart', [AddToCartController::class, 'index'])->name('shopping.cart');
Route::get('/book/{id}', [AddToCartController::class, 'addToCart'])->name('addbook.to.cart');
Route::patch('/update-shopping-cart', [AddToCartController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [AddToCartController::class, 'deleteProduct'])->name('delete.cart.product');
Route::get('user-orders',[OrderController::class,'index'])->name('orders.listing');
Route::get('user-orders',[OrderController::class,'index'])->name('orders.listing');
Route::post('orders',[OrderController::class,'store'])->name('orders.store');
Route::get('/orders/rating/{orderId}/{oderDetailId}',[OrderController::class,'showRatingView'])->name('orders.rating.view');
Route::post('/orders/rating/{orderId}/{oderDetailId}',[OrderController::class,'ratingStore'])->name('orders.rating.store');

Route::get('thankyou', function(){
    return view('frontend.thankyou');
})->name('thanksyou');

Route::prefix('admin')
	->name('admin.')
	->group(function () {
		Route::get('/', function () {
	        return view('admin.login');
	    })
	    ->name('login')
	    ->middleware('guest');

    Route::get('/dashboard',  [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    //Resource routes
    Route::resource('users', UserController::class)->parameters([
        'users' => 'user'
    ]);
    Route::resource('books', BooksController::class)->parameters([
        'books' => 'book'
    ]);
		
});



