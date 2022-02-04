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
Route::get('/admin', \App\Http\Controllers\admin\DashboardController::class . '@login');

Route::get('/admin/admin', \App\Http\Controllers\admin\AdminController::class . '@index');
Route::post('/adminbaru', \App\Http\Controllers\admin\AdminController::class . '@store');
Route::get('/hapusadmin/{id}', \App\Http\Controllers\admin\AdminController::class . '@delete');

Route::get('/admin/user', \App\Http\Controllers\admin\UserController::class . '@index');
// Route::post('/userbaru', UserController::class . '@store');
Route::get('/hapususer/{id}', \App\Http\Controllers\admin\UserController::class . '@delete');

Route::get('/admin/customer', \App\Http\Controllers\admin\CustomerController::class . '@index');

Route::patch('/statusaktif', \App\Http\Controllers\admin\CustomerController::class . '@store_aktif');
Route::patch('/statusnonaktif', \App\Http\Controllers\admin\CustomerController::class . '@store_nonaktif');

Route::get('/previewktp/{id}', \App\Http\Controllers\admin\CustomerController::class . '@getpreviewktp');
Route::get('/previewselfiektp/{id}', \App\Http\Controllers\admin\CustomerController::class . '@getpreviewselfiektp');
Route::get('/previewnpwp/{id}', \App\Http\Controllers\admin\CustomerController::class . '@getpreviewnpwp');

Route::get('/admin/petani', \App\Http\Controllers\admin\PetaniController::class . '@index');
Route::get('/admin/petani/addKota/{id}', \App\Http\Controllers\admin\PetaniController::class . '@getStates');
Route::get('/admin/petani/addKecamatan/{id}', \App\Http\Controllers\admin\PetaniController::class . '@kecamatan');
Route::get('/admin/petani/addKelurahan/{id}', \App\Http\Controllers\admin\PetaniController::class . '@kelurahan');

Route::get('/admin/pemasaran', \App\Http\Controllers\admin\PemasaranController::class . '@index');
Route::post('/admin/approvePengajuan/{id}', \App\Http\Controllers\admin\PemasaranController::class . '@approvePengajuan');
Route::post('/admin/tolak_pemasaran/{id}', \App\Http\Controllers\admin\PemasaranController::class . '@tolakPengajuan');
Route::get('/admin/pembayaran', \App\Http\Controllers\admin\PembayaranController::class . '@pembayaran');
Route::post('/admin/tolak_pemabayaran/{id}', \App\Http\Controllers\admin\PembayaranController::class . '@tolakPembayaran');
Route::post('/admin/approvePembayaran/{id}', \App\Http\Controllers\admin\PembayaranController::class . '@approvePembayaran');
Route::get('/admin/pengembalian', \App\Http\Controllers\admin\PembayaranController::class . '@pengembalian');
Route::post('/admin/tolak_pengembalian/{id}', \App\Http\Controllers\admin\PembayaranController::class . '@tolakPengembalian');
Route::post('/admin/approvePengembalian/{id}', \App\Http\Controllers\admin\PembayaranController::class . '@approvePengembalian');
Route::get('/admin/scan', \App\Http\Controllers\admin\scanController::class . '@index');
Route::get('/petani/verifikasi/{id}', \App\Http\Controllers\admin\scanController::class . '@verifikasi');
// Untuk user

Route::get('/register', \App\Http\Controllers\user\UserController::class . '@index');
Route::post('/userbaru', \App\Http\Controllers\user\UserController::class . '@store');

//Petani
Route::get('/applyProposal', \App\Http\Controllers\user\transaksiController::class . '@applyProposal');
Route::post('/applyproposalbaru', \App\Http\Controllers\user\transaksiController::class . '@store_applyProposal');
Route::get('/dokumen', \App\Http\Controllers\user\dokumenPetaniController::class . '@index');
Route::post('/dokumenpetanibaru', \App\Http\Controllers\user\dokumenPetaniController::class . '@store_dokumenpetani');
Route::get('/dokumenpetaniupdate', \App\Http\Controllers\user\dokumenPetaniController::class . '@dokumenpetani');
Route::post('/updatedokumenpetani', \App\Http\Controllers\user\dokumenPetaniController::class . '@updatedokumenpetani');
Route::get('/kelolaProyek', \App\Http\Controllers\user\kelolaProyekController::class . '@index');
Route::get('/riwayatPengajuan', \App\Http\Controllers\user\riwayatController::class . '@riwayatPetani');
Route::get('/daftarpetani', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarpetani');
Route::post('/petanibaru', \App\Http\Controllers\user\AturProfilController::class . '@store_petani');
Route::get('/profilpetani', \App\Http\Controllers\user\AturProfilController::class . '@profilpetani');    
Route::post('/petaniupdate', \App\Http\Controllers\user\AturProfilController::class . '@petaniupdate');   
Route::get('/qrcode', \App\Http\Controllers\user\AturProfilController::class . '@qrcode');
Route::get('/inforekeningpetani', \App\Http\Controllers\user\dokumenPetaniController::class . '@index_rekening');
Route::post('/rekeningbarupetani', \App\Http\Controllers\user\dokumenPetaniController::class . '@store_rekeningbaru');


// Customer
Route::get('/applyInvestasi/{id}', \App\Http\Controllers\user\transaksiController::class . '@applyInvestasi');
Route::post('/pembayaran', \App\Http\Controllers\user\transaksiController::class . '@pembayaran');
Route::post('/konfirmasi', \App\Http\Controllers\user\transaksiController::class . '@konfirmasi');
Route::post('/pay', \App\Http\Controllers\user\transaksiController::class . '@payment');
Route::get('/riwayatInvestasi', \App\Http\Controllers\user\riwayatController::class . '@riwayatInvestor');

Route::get('/', \App\Http\Controllers\user\DashboardController::class . '@index');
// Route::get('/dashboard', \App\Http\Controllers\user\DashboardController::class . '@index')->name('dashboard');
Route::get('/login', \App\Http\Controllers\user\LoginController::class . '@index')->name('login');
Route::post('/postLogin', \App\Http\Controllers\user\LoginController::class . '@postLogin');
Route::get('/logout', \App\Http\Controllers\user\LoginController::class . '@logout');

//Route::group(['middleware' => ['auth', 'role:customer,mix']], function () {
    Route::get('/dashboard', \App\Http\Controllers\user\DashboardController::class . '@index')->name('dashboard');
//});
//Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/daftarcustomer', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarcustomer');
    Route::get('/profilcustomer', \App\Http\Controllers\user\AturProfilController::class . '@index_profilcustomer');
    Route::post('/customerbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarcustomer');
    Route::post('/customerupdate', \App\Http\Controllers\user\AturProfilController::class . '@store_updatecustomer');

    Route::get('/lengkapidokumen', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarcustomer2');
    Route::post('/dokumenbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarcustomer2');
    Route::get('/dokumencustomer', \App\Http\Controllers\user\AturProfilController::class . '@dokumencustomer');
    Route::post('/dokumenupdate', \App\Http\Controllers\user\AturProfilController::class . '@updatedokumen');

    Route::get('/inforekeningcustomer', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarcustomer3');
    Route::post('/rekeningbaru', \App\Http\Controllers\user\AturProfilController::class . '@store_daftarcustomer3');

    Route::get('/daftarpetani', \App\Http\Controllers\user\AturProfilController::class . '@index_daftarpetani');
    Route::post('/petanibaru', \App\Http\Controllers\user\AturProfilController::class . '@store_petani');
    Route::get('/profilpetani', \App\Http\Controllers\user\AturProfilController::class . '@profilpetani');    
    Route::post('/petaniupdate', \App\Http\Controllers\user\AturProfilController::class . '@petaniupdate');
//});

