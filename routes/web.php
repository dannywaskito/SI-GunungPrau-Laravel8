<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Models\User;
use App\Models\PendakiModel;
use App\Models\PenyewaanModel;
use App\Models\BeritaModel;
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
    // Contact
    Route::get('contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::get('addContact', [AdminController::class, 'addContact'])->name('admin.addContact');
    Route::post('insertContact', [AdminController::class, 'insertContact']);
    Route::get('editContact/{id_contact}',[AdminController::class, 'editContact']);
    Route::post('updateContact/{id_contact}', [AdminController::class, 'updateContact']);
    Route::get('hapusContact/{id_contact}', [AdminController::class, 'hapusContact']);
    // End Contact
    // Berita
    Route::get('berita', [AdminController::class, 'berita'])->name('admin.berita');
    Route::get('addBerita', [AdminController::class, 'addBerita'])->name('admin.addBerita');
    Route::post('insertBerita', [AdminController::class, 'insertBerita']);
    Route::get('editBerita/{id_berita}', [AdminController::class, 'editBerita']);
    Route::post('updateBerita/{id_berita}', [AdminController::class, 'updateBerita']);
    Route::get('hapusBerita/{id_berita}',[AdminController::class, 'hapusBerita']);
    // End Berita
       // Pendaki
    Route::get('pendaki', [AdminController::class, 'pendaki'])->name('admin.pendaki');
    Route::get('addPendaki', [AdminController::class, 'addPendaki'])->name('admin.addPendaki');
    Route::post('insertPendaki', [AdminController::class, 'insertPendaki']);
    Route::get('editPendaki/{id_pendaki}',[AdminController::class, 'editPendaki']);
    Route::post('updatePendaki/{id_pendaki}', [AdminController::class, 'updatePendaki']);
    Route::get('hapusPendaki/{id_pendaki}', [AdminController::class, 'hapusPendaki']);
    // End Pendaki
           // penyewaan
    Route::get('penyewaan', [AdminController::class, 'penyewaan'])->name('admin.penyewaan');
    Route::get('addPenyewaan', [AdminController::class, 'addPenyewaan'])->name('admin.addPenyewaan');
    Route::post('insertPendaki', [AdminController::class, 'insertPendaki']);
    Route::get('editPenyewaan/{id_penyewaan}',[AdminController::class, 'editPenyewaan']);
    Route::post('updatePenyewaan/{id_penyewaan}', [AdminController::class, 'updatePenyewaan']);
    Route::get('hapusPenyewaan/{id_penyewaan}', [AdminController::class, 'hapusPenyewaan']);
    // End penyewaan
    // Kecamatan Controller
    Route::get('kecamatan', [AdminController::class, 'kecamatan'])->name('admin.kecamatan');
    Route::get('addKecamatan', [AdminController::class, 'addKecamatan'])->name('admin.addKecamatan');
    Route::post('insertKecamatan', [AdminController::class, 'insertKecamatan']);
    Route::get('editKecamatan/{id_kecamatan}',[AdminController::class, 'editKecamatan']);
    Route::post('updateKecamatan/{id_kecamatan}', [AdminController::class, 'updateKecamatan']);
    Route::get('hapusKecamatan/{id_kecamatan}', [AdminController::class, 'hapusKecamatan']);
    // End Kecamatan Controller
     // Kegiatan

    // Add Data Admin
    Route::get('user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('add', [AdminController::class, 'add']);
    Route::post('insertAdmin', [AdminController::class, 'insertAdmin']);
    Route::get('deleteUser/{id}',[AdminController::class, 'deleteUser']);
    // End Add Data Admin
    Route::get('akun', [AdminController::class, 'akun'])->name('admin.akun');
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Pendaftaran
    Route::get('daftar', [UserController::class, 'daftar'])->name('user.daftar');
    Route::get('addData', [UserController::class, 'addData'])->name('user.addData');
    Route::post('insertData', [UserController::class, 'insertData']);
    // End Pendaftaran

        // Penyewaan
    Route::get('sewa', [UserController::class, 'sewa'])->name('user.sewa');
    Route::get('addSewa', [UserController::class, 'addSewa'])->name('user.addSewa');
    Route::post('insertSewa', [UserController::class, 'insertSewa']);
    // End Penyewaan

    Route::get('contact', [UserController::class, 'contact'])->name('user.contact');
    Route::get('berita', [UserController::class, 'berita'])->name('user.berita');
    Route::get('detailberita/{id_berita}', [UserController::class, 'detailberita']);
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
    Route::get('datapendaki', function () {
        $pendaki = PendakiModel::with('user')->get();
        return view('dashboard.user.datapendaki', ['pendaki' => $pendaki]);
    })->name('user.datapendaki');
});



// front end
 // Route::get('kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
 // Route::get('detailkegiatan/{id_kegiatan}', [WebController::class, 'detailkegiatan']);
 // Route::get('listkegiatan', [WebController::class, 'listkegiatan']);
 //  Route::get('kritik', [WebController::class, 'kritik'])->name('kritik');

 //  Route::post('insertKritik', [WebController::class, 'insertKritik']);
