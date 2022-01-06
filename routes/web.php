<?php

use Illuminate\Support\Facades\Route;

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
//     return view('/user/pembayaran');
// });
// Route::get('/user/pembayaran', \App\Http\Controllers\PembayaranController::class . '@index');

// Untuk admin
Route::get('/admin/dashboard', \App\Http\Controllers\admin\DashboardController::class . '@index');

Route::get('/admin/admin', \App\Http\Controllers\admin\AdminController::class . '@index');
Route::post('/adminbaru', \App\Http\Controllers\admin\AdminController::class . '@store');
Route::delete('/hapusadmin/{id}', \App\Http\Controllers\admin\AdminController::class . '@delete');

Route::get('/admin/user', \App\Http\Controllers\admin\UserController::class . '@index');
// Route::post('/userbaru', UserController::class . '@store');
Route::delete('/hapususer/{id}', UserController::class . '@delete');

Route::get('/admin/customer', \App\Http\Controllers\admin\CustomerController::class . '@index');

Route::patch('/statusaktif', \App\Http\Controllers\admin\CustomerController::class . '@store_aktif');
Route::patch('/statusnonaktif', \App\Http\Controllers\admin\CustomerController::class . '@store_nonaktif');

Route::get('/previewktp/{id}', \App\Http\Controllers\admin\CustomerController::class . '@getpreviewktp');
Route::get('/previewselfiektp/{id}', \App\Http\Controllers\admin\CustomerController::class . '@getpreviewselfiektp');
Route::get('/previewnpwp/{id}', \App\Http\Controllers\admin\CustomerController::class . '@getpreviewnpwp');

Route::get('/admin/petani', \App\Http\Controllers\admin\PetaniController::class . '@index');

// Untuk user

Route::get('/register', \App\Http\Controllers\user\UserController::class . '@index');
Route::post('/userbaru', \App\Http\Controllers\user\UserController::class . '@store');

Route::get('/', \App\Http\Controllers\user\DashboardController::class . '@index');
// Route::get('/dashboard', \App\Http\Controllers\user\DashboardController::class . '@index')->name('dashboard');
Route::get('/login', \App\Http\Controllers\user\LoginController::class . '@index')->name('login');
Route::post('/postLogin', \App\Http\Controllers\user\LoginController::class . '@postLogin');
Route::get('/logout', \App\Http\Controllers\user\LoginController::class . '@logout');

Route::group(['middleware' => ['auth', 'role:customer,mix']], function () {
    Route::get('/dashboard', \App\Http\Controllers\user\DashboardController::class . '@index')->name('dashboard');
});
Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/daftarcustomer', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarcustomer');
    Route::patch('/customerbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarcustomer');

    Route::get('/lengkapidokumen', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarcustomer2');
    Route::patch('/dokumenbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarcustomer2');

    Route::get('/inforekeningcustomer', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarcustomer3');
    Route::patch('/rekeningbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarcustomer3');

    Route::get('/daftarpetani', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarpetani');
    Route::post('/petanibaru', \App\Http\Controllers\user\AturProfilController::class . '@store_petani');
});

Route::group(['middleware' => ['auth', 'role:mix']], function () {
    Route::get('/dashboard_petani', \App\Http\Controllers\user\DashboardController::class . '@index_petani')->name('dashboard');

    // Route::get('/daftarpetani', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarpetani');
    // Route::patch('/petanibaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarpetani');

    // Route::get('/lengkapidokumen', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarpetani2');
    // Route::patch('/dokumenbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarpetani2');

    // Route::get('/inforekeningpetani', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarpetani3');
    // Route::patch('/rekeningpetani', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarpetani3');

});
