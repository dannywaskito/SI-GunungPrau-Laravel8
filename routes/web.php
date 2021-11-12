<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [WebController::class, 'index']);
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    // Kecamatan Controller
    Route::get('kecamatan', [AdminController::class, 'kecamatan'])->name('admin.kecamatan');
    Route::get('addKecamatan', [AdminController::class, 'addKecamatan'])->name('admin.addKecamatan');
    Route::post('insertKecamatan', [AdminController::class, 'insertKecamatan']);
    Route::get('editKecamatan/{id_kecamatan}',[AdminController::class, 'editKecamatan']);
    Route::post('updateKecamatan/{id_kecamatan}', [AdminController::class, 'updateKecamatan']);
    Route::get('hapusKecamatan/{id_kecamatan}', [AdminController::class, 'hapusKecamatan']);
    // End Kecamatan Controller
     // Kegiatan
    Route::get('kegiatan', [AdminController::class, 'kegiatan'])->name('admin.kegiatan');
    Route::get('addKegiatan', [AdminController::class, 'addKegiatan'])->name('admin.addKegiatan');
    Route::post('insertKegiatan', [AdminController::class, 'insertKegiatan']);
     Route::get('editKegiatan/{id_kegiatan}', [AdminController::class, 'editKegiatan']);
    Route::post('updateKegiatan/{id_kegiatan}', [AdminController::class, 'updateKegiatan']);
     Route::get('hapuskegiatan/{id_kegiatan}',[AdminController::class, 'hapuskegiatan']);
    // Add Data Admin
    Route::get('user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('add', [AdminController::class, 'add']);
    Route::post('insertAdmin', [AdminController::class, 'insertAdmin']);
    Route::get('deleteAdmin/{id}',[AdminController::class, 'deleteAdmin']);
    // End Add Data Admin
    Route::get('akun', [AdminController::class, 'akun'])->name('admin.akun');
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('addData', [UserController::class, 'addData'])->name('user.addData');
    Route::post('insertData', [UserController::class, 'insertData']);
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
     // Route::get('riwayatPendaftaran', [UserController::class, 'riwayatPendaftaran'])->name('user.riwayatPendaftaran');
    // Route::get('data', function () {
    //     $master = Master::with('user')->get();
    //     return view('dashboard.user.data', ['master' => $master]);
    // })->name('user.data');
});

// front end
 Route::get('kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
 Route::get('detailkegiatan/{id_kegiatan}', [WebController::class, 'detailkegiatan']);

