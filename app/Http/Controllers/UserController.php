<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Master;
use App\Models\PendakianModel;
use App\Models\PenyewaanModel;
use App\Models\ContactModel;
use App\Models\BeritaModel;

class UserController extends Controller
{
   public function __construct()
   {
       $this->ContactModel = new ContactModel();
        $this->BeritaModel = new BeritaModel();
   }

    //
   function index()
   {
    return view('dashboard.user.index');
}

function profile()
{
    return view('dashboard.user.profile');
}
    // Daftar Pendakian
function daftar()
{
    $pendakian = PendakianModel::with('user')->get();
    return view('dashboard.user.daftar.index',['pendakian' => $pendakian]);
}
function addData()
{
    return view('dashboard.user.daftar.v_add');
}
function insertData(Request $request){
    $request->validate([
        'tgl_pendakian'=>['required','string'],
        'akhir_pendakian'=>['required','string'],
        'nik_ketua'=>['required','string'],
        'jenis_kelamin'=>['required','string'],
        'tgl_lahir'=>['required','string'],
        'alamat'=>['required','string'],
        'handphone'=>['required','string'],
        'telp_rumah'=>['required','string'],
        'pekerjaan'=>['required','string'],
        'anggota_pendaki'=>['required','string'],

    ]);
    $pendakian = new PendakianModel();
    $pendakian->tgl_pendakian = $request->tgl_pendakian;
    $pendakian->akhir_pendakian = $request->akhir_pendakian;
    $pendakian->nik_ketua = $request->nik_ketua;
    $pendakian->jenis_kelamin = $request->jenis_kelamin;
    $pendakian->tgl_lahir = $request->tgl_lahir;
    $pendakian->alamat = $request->alamat;
    $pendakian->handphone = $request->handphone;
    $pendakian->telp_rumah = $request->telp_rumah;
    $pendakian->pekerjaan = $request->pekerjaan;
    $pendakian->anggota_pendaki = $request->anggota_pendaki;
    $pendakian->user_id = Auth::user()->id;
    if ($pendakian->save()) {
        return redirect()->route('user.daftar')->with('pesan','Data Anda Berhasil di Ajukan');
    }else{
        return redirect()->back()->with('error','Gagal Tambah, Silahkan Coba Lagi');
    }
}

// Penyewaan Barang
function sewa()
{
    $sewa = PenyewaanModel::with('user')->get();
    return view('dashboard.user.sewa.index',['sewa' => $sewa]);
}
function addSewa()
{
    return view('dashboard.user.sewa.v_add');
}
function insertSewa(Request $request){
    $request->validate([
        'no_ktp'=>['required','string'],
        'sleeping_bag'=>['required','string'],
        'tenda'=>['required','string'],
        'matras'=>['required','string'],
        'nesting'=>['required','string'],
        'kompor'=>['required','string'],
    ]);
    $sewa = new PenyewaanModel();
    $sewa->no_ktp = $request->no_ktp;
    $sewa->sleeping_bag = $request->sleeping_bag;
    $sewa->tenda = $request->tenda;
    $sewa->matras = $request->matras;
    $sewa->nesting = $request->nesting;
    $sewa->kompor = $request->kompor;

    $sewa->user_id = Auth::user()->id;
    if ($sewa->save()) {
        return redirect()->route('user.sewa')->with('pesan','Peminjaman Barang Anda Berhasil di Ajukan');
    }else{
        return redirect()->back()->with('error','Gagal Tambah, Silahkan Coba Lagi');
    }
}

    // Contact Us

function contact()
{
    $data = [
        'contact' => $this->ContactModel->AllData(),
    ];
    return view('dashboard.user.contact', $data);
}

function berita()
{
    $data = [
        'berita' => $this->BeritaModel->AllData(),
    ];
    return view('dashboard.user.berita', $data);
}
public function detailberita($id_berita)
{    $berita = $this->BeritaModel->DetailBerita($id_berita);
    $data = [
     'title' =>'Detail Berita '. $berita->judul,
     'berita' => $this->BeritaModel->AllData(),
     'berita' => $berita,
];
 return view('dashboard.user.v_detailberita', $data);
}
function updateInfo(Request $request){

   $validator = \Validator::make($request->all(),[
       'name'=>'required',
       'bio'=>'required',
       'email'=> 'required|email',
   ]);

   if(!$validator->passes()){
       return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
   }else{
    $query = User::find(Auth::user()->id)->update([
     'name'=>$request->name,
     'bio'=>$request->bio,
     'email'=>$request->email,
     'no_hp'=>$request->no_hp,
 ]);

    if(!$query){
        return response()->json(['status'=>0,'msg'=>'Gagal Update Profil, silahkan Coba Lagi']);
    }else{
        return response()->json(['status'=>1,'msg'=>'Profil Anda telah berhasil di Update']);
    }
}
}
function updatePicture(Request $request){
 $path = 'users/images/';
 $file = $request->file('user_image');
 $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

           //Upload new image
 $upload = $file->move(public_path($path), $new_name);

 if( !$upload ){
     return response()->json(['status'=>0,'msg'=>'Gagal Upload Foto']);
 }else{
               //Get Old picture
     $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

     if( $oldPicture != '' ){
         if( \File::exists(public_path($path.$oldPicture))){
             \File::delete(public_path($path.$oldPicture));
         }
     }

               //Update DB
     $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

     if( !$upload ){
         return response()->json(['status'=>0,'msg'=>'Gagal Upload Foto.']);
     }else{
         return response()->json(['status'=>1,'msg'=>'Foto Profil Anda telah berhasil diperbarui']);
     }
 }
}
function changePassword(Request $request){
           //Validate form
 $validator = \Validator::make($request->all(),[
     'oldpassword'=>[
         'required', function($attribute, $value, $fail){
             if( !\Hash::check($value, Auth::user()->password) ){
                 return $fail(__('Password Lama Anda Salah, Silahkan Ulangi lagi'));
             }
         },
         'min:8',
         'max:30'
     ],
     'newpassword'=>'required|min:8|max:30',
     'cnewpassword'=>'required|same:newpassword'
 ],[
    'oldpassword.required'=>'Masukkan Password Lama Anda',
    'oldpassword.min'=>'Password Lama harus memiliki minimal 8 karakter',
    'oldpassword.max'=>'Password Lama tidak boleh lebih dari 30 karakter',
    'newpassword.required'=>'Masukkan Password Baru Anda',
    'newpassword.min'=>'Password Baru harus memiliki minimal 8 karakter',
    'newpassword.max'=>'Password Baru tidak boleh lebih dari 30 karakter',
    'cnewpassword.required'=>'Masukkan kembali Password baru Anda',
    'cnewpassword.same'=>'Password baru dan Konfirmasi Password baru harus cocok
    '
]);

 if( !$validator->passes() ){
     return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
 }else{

    $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

    if( !$update ){
        return response()->json(['status'=>0,'msg'=>'Gagal Update Password']);
    }else{
        return response()->json(['status'=>1,'msg'=>'Kata sandi Anda telah berhasil di update
            ']);
    }
}
}
}
