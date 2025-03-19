<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PemesananUserController;
use App\Http\Controllers\TukangController;
use App\Http\Controllers\AdminTukangController;
use App\Http\Controllers\KategorijasaController;


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
Route::get('/', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('home');
});
Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::get('register_tukang', [TukangController::class,'create'])->name('register_tukang');

Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['auth_login:admin']], function () {
        Route::resource('admin', AdminController::class);
        Route::group(['prefix' => 'jasa'],function() {
        Route::get('/', [JasaController::class,'index'])->name('jasa.index');
            Route::get('/create', [JasaController::class,'create'])->name('jasa.create');
            Route::post('/store', [JasaController::class,'store'])->name('jasa.store');
            Route::get('/destroy/{id}', [JasaController::class,'destroy'])->name('jasa.destroy');
            Route::get('/edit/{id}', [JasaController::class,'edit'])->name('jasa.edit');
            Route::put('/update/{id}', [JasaController::class,'update'])->name('jasa.update');
        });
        Route::group(['prefix' => 'kategori_jasa'],function() {
            Route::get('/', [KategorijasaController::class,'index'])->name('kategori_jasa.index');
            Route::get('/create', [KategorijasaController::class,'create'])->name('kategori_jasa.create');
            Route::post('/store', [KategorijasaController::class,'store'])->name('kategori_jasa.store');
            Route::get('/destroy/{id}', [KategorijasaController::class,'destroy'])->name('kategori_jasa.destroy');
            Route::get('/edit/{id}', [KategorijasaController::class,'edit'])->name('kategori_jasa.edit');
            Route::put('/update/{id}', [KategorijasaController::class,'update'])->name('kategori_jasa.update');
        });
        // route for Alamat
        Route::group(['prefix' => 'alamat'],function() {
            Route::get('/', [AlamatController::class,'index'])->name('alamat.index');
            Route::get('/create', [AlamatController::class,'create'])->name('alamat.create');
           
            Route::get('/destroy/{id}', [AlamatController::class,'destroy'])->name('alamat.destroy');
            Route::get('/edit/{id}', [AlamatController::class,'edit'])->name('alamat.edit');
            Route::put('/update/{id}', [AlamatController::class,'update'])->name('alamat.update');
        });

        // route for Bank
        Route::group(['prefix' => 'bank'],function() {
            Route::get('/', [BankController::class,'index'])->name('bank.index');
            Route::get('/create', [BankController::class,'create'])->name('bank.create');
            Route::post('/store', [BankController::class,'store'])->name('bank.store');
            Route::get('/destroy/{id}', [BankController::class,'destroy'])->name('bank.destroy');
            Route::get('/edit/{id}', [BankController::class,'edit'])->name('bank.edit');
            Route::put('/update/{id}', [BankController::class,'update'])->name('bank.update');
        });

        // route for Keahlian
        Route::group(['prefix' => 'keahlian'],function() {
            Route::get('/', [KeahlianController::class,'index'])->name('keahlian.index');
            Route::get('/create', [KeahlianController::class,'create'])->name('keahlian.create');
            Route::post('/store', [KeahlianController::class,'store'])->name('keahlian.store');
            Route::get('/destroy/{id}', [KeahlianController::class,'destroy'])->name('keahlian.destroy');
            Route::get('/edit/{id}', [KeahlianController::class,'edit'])->name('keahlian.edit');
            Route::put('/update/{id}', [KeahlianController::class,'update'])->name('keahlian.update');
        });

        // route for Pelanggan
        Route::group(['prefix' => 'pelanggan'],function() {
            Route::get('/', [PelangganController::class,'index'])->name('pelanggan.index');
            Route::get('/create', [PelangganController::class,'create'])->name('pelanggan.create');
            Route::post('/store', [PelangganController::class,'store'])->name('pelanggan.store');
            Route::get('/destroy/{id}', [PelangganController::class,'destroy'])->name('pelanggan.destroy');
            Route::get('/edit/{id}', [PelangganController::class,'edit'])->name('pelanggan.edit');
            Route::put('/update/{id}', [PelangganController::class,'update'])->name('pelanggan.update');
        });

        // route for Tukang
        Route::group(['prefix' => 'admin_tukang'],function() {
            Route::get('/', [AdminTukangController::class,'index'])->name('admin_tukang.index');
            Route::get('/create', [AdminTukangController::class,'create'])->name('admin_tukang.create');
            Route::post('/store', [AdminTukangController::class,'store'])->name('admin_tukang.store');
            Route::get('/destroy/{id}', [AdminTukangController::class,'destroy'])->name('admin_tukang.destroy');
            Route::get('/edit/{id}', [AdminTukangController::class,'edit'])->name('admin_tukang.edit');
            Route::put('/update/{id}', [AdminTukangController::class,'update'])->name('admin_tukang.update');
        });
        
       
    });
    Route::group(['middleware' => ['auth_login:user']], function () {
        Route::resource('user', UserController::class);
        Route::group(['prefix' => 'u_pemesanan'],function() {
            Route::get('/', [PemesananUserController::class,'index'])->name('u_pemesanan.index');
            Route::get('/home_maintenance', [PemesananUserController::class,'home_maintenance'])->name('u_pemesanan.home_maintenance');
            Route::post('/store', [PemesananUserController::class,'store'])->name('u_pemesanan.store');
            Route::get('/destroy/{id}', [PemesananUserController::class,'destroy'])->name('u_pemesanan.destroy');
            Route::get('/edit/{id}', [PemesananUserController::class,'edit'])->name('u_pemesanan.edit');
            Route::put('/update/{id}', [PemesananUserController::class,'update'])->name('u_pemesanan.update');
        });
        Route::get('/profile', [UserController::class,'profile'])->name('user.profile');
        Route::get('/alamat', [UserController::class,'alamat'])->name('user.alamat');
        Route::get('/ubah_alamat/{id_alamat}', [UserController::class,'ubah_alamat'])->name('user.ubah_alamat');
        Route::post('/alamat_save', [UserController::class,'store_alamat'])->name('alamat.store');
    });

    Route::group(['middleware' => ['auth_login:tukang']], function () {
        Route::group(['prefix' => 'tukang'],function() {
            Route::get('/', [TukangController::class,'index'])->name('tukang.index');
            Route::get('/profile_tukang', [TukangController::class,'profile'])->name('tukang.profile');
            Route::post('/pemesanan_tukang', [TukangController::class,'pemesanan'])->name('tukang.pemesanan');
            Route::post('/store', [TukangController::class,'store'])->name('tukang.store');
            Route::get('/destroy/{id}', [TukangController::class,'destroy'])->name('tukang.destroy');
            Route::get('/edit/{id}', [TukangController::class,'edit'])->name('tukang.edit');
            Route::put('/update/{id}', [TukangController::class,'update'])->name('tukang.update');
        });
    });
});