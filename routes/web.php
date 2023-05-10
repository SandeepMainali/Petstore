<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

// Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('/message', [UserController::class, 'message'])->name('message');

Route::post('/addcart/{id}',[HomeController::class,'addcart'])->name('addcart');
Route::get('/showcart',[HomeController::class,'showcart'])->name('showcart');
Route::get('/deletecart/{id}',[HomeController::class,'deletecart'])->name('deletecart');
Route::post('/order',[HomeController::class,'confirmorder'])->name('order');

// <--Admin Panel-->
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/addproduct', [HomeController::class, 'addproduct'])->name('addproduct');


Route::post('/addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
Route::get('/showproduct', [AdminController::class, 'showproduct'])->name('showproduct');
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct'])->name('deleteproduct');
Route::get('/updateview/{id}',[AdminController::class,'updateview'])->name('updateview');
Route::post('/updateproduct/{id}',[AdminController::class,'updateproduct'])->name('updateproduct');
Route::get('/showorder',[AdminController::class,'showorder'])->name('showorder');
Route::get('/deleteorder/{id}',[AdminController::class,'deleteorder'])->name('deleteorder');
Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus'])->name('updatestatus');
