<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome'); })->name('welcome');
Route::get('/contact', function () {return view('contact'); });

Route::get('/packagesview', [Controller::class, 'indexpublic'])->name('packages');
Route::get('/blogs', [Controller::class, 'blogspublic'])->name('publicblog');




/*Bookings*/
Route::get('/bookings',[BookingController::class, 'index'])->name('bookings');
Route::get('/bookings/book', [BookingController::class, 'book'])->name('booknow');
Route::post('/bookings', [BookingController::class, 'store'])->name('postbooking');
Route::get('/bookings/{id}', [BookingController::class, 'show']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');



Route::middleware(['auth'])->group(function () {
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my-bookings');
}); 

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin');
    Route::get('/admin.users', [AdminController::class, 'usersview'])->name('users');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/add-category', [CategoryController::class, 'add'])->name('add-category');
    Route::post('/insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::delete('delete-category/{id}', [CategoryController::class, 'destroy']);

    /*packages*/
    Route::get('/packages', [PackageController::class, 'index'])->name('adminview-packages');
    Route::get('/add-packages', [PackageController::class, 'add'])->name('add-packages');
    Route::post('/insert-package', [PackageController::class, 'insert'])->name('insert-package');
    Route::get('/edit-package/{id}', [PackageController::class, 'edit']);
    Route::put('/update-package/{id}', [PackageController::class, 'update']);
    Route::delete('delete-package/{id}', [PackageController::class, 'destroy']);

    Route::get('/bookings',[BookingController::class, 'index'])->name('bookings');
    /*blogs*/
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('create-blog');
    Route::post('/blogs', [BlogController::class, 'store'])->name('store-blog');
    Route::delete('delete-blog/{id}', [BlogController::class, 'destroy']);
});

/*Blog */



/*shop crud */

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');







