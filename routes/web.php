<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [HomeController::class, 'index']);

//Danh muc san pham
Route::get('/category-list/{productid}', [CategoryController::class, 'showInHome']);
//Thuong hieu san pham
Route::get('/manu-list/{manuid}', [ManuController::class, 'showInHome']);
//Chi tiet san pham
Route::get('/detail/{spid}',[ProductController::class, 'detailProduct']);


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'showdashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

//Category
Route::get('/add-product', [CategoryController::class, 'addProduct']);
Route::get('/all-product', [CategoryController::class, 'allProduct']);
Route::post('/saveproduct', [CategoryController::class, 'saveProduct']);

Route::get('/editproduct/{productid}', [CategoryController::class, 'editProduct']);
Route::post('/updateproduct/{productid}', [CategoryController::class, 'updateProduct']);

Route::get('/deleteproduct/{productid}', [CategoryController::class, 'deleteProduct']);
Route::get('/showproduct/{productid}', [CategoryController::class, 'showProduct']);
Route::get('/hideproduct/{productid}', [CategoryController::class, 'hideProduct']);
// End Category

// Manufacturer
Route::get('/add-manu', [ManuController::class, 'addManu']);
Route::get('/all-manu', [ManuController::class, 'allManu']);
Route::post('/savemanu', [ManuController::class, 'saveManu']);

Route::get('/editmanu/{manuid}', [ManuController::class, 'editManu']);
Route::post('/updatemanu/{manuid}', [ManuController::class, 'updateManu']);

Route::get('/deletemanu/{manuid}', [ManuController::class, 'deleteManu']);
Route::get('/showmanu/{manuid}', [ManuController::class, 'showManu']);
Route::get('/hidemanu/{manuid}', [ManuController::class, 'hideManu']);
// End Manufacturer

// SP
Route::get('/add-sp', [ProductController::class, 'addSP']);
Route::get('/all-sp', [ProductController::class, 'allSP']);
Route::post('/savesp', [ProductController::class, 'saveSP']);

Route::get('/editsp/{spid}', [ProductController::class, 'editSP']);
Route::post('/updatesp/{spid}', [ProductController::class, 'updateSP']);

Route::get('/deletesp/{spid}', [ProductController::class, 'deleteSP']);
Route::get('/showsp/{spid}', [ProductController::class, 'showSP']);
Route::get('/hidesp/{spid}', [ProductController::class, 'hideSP']);
// End SP

//User
Route::get('/add-user', [UserController::class, 'addUser']);
Route::get('/all-user', [UserController::class, 'allUser']);
Route::post('/saveuser', [UserController::class, 'saveUser']);

Route::get('/edituser/{userid}', [UserController::class, 'editUser']);
Route::post('/updateuser/{userid}', [UserController::class, 'updateUser']);

Route::get('/deleteuser/{userid}', [UserController::class, 'deleteUser']);
//End User




//Cart
Route::post('/to-cart',[CartController::class, 'toCart']);
Route::post('/checkout',[CheckoutController::class, 'checkout']);
//End Cart

//Search
Route::post('/search',[HomeController::class, 'search']);
//End Search
