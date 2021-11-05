<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\KecamatanModel;
use App\Models\KegiatanModel;

class AdminController extends Controller
{
    public function __construct()
    {
     $this->KecamatanModel = new KecamatanModel();
     $this->KegiatanModel = new KegiatanModel();
 }
    //
 function index()
 {
    return view('dashboard.admin.index');
}

// Kecamatan
function kecamatan()
{
    $data = [
        'kecamatan' => $this->KecamatanModel->AllData(),
    ];
    return view('dashboard.admin.kecamatan.index', $data);
}
function addKecamatan()
{
    $data = [
        'kecamatan' => $this->KecamatanModel->AllData(),
    ];
    return view('dashboard.admin.kecamatan.v_add', $data);
}
function insertKecamatan(Request $request)
{
   $request->validate([
    'kecamatan'=>'required',
    'warna'=>'required',
    'geojson'=>'required',

],
[
    'kecamatan.required' => 'Wajib Diisi !!',
    'warna.required' => 'Wajib Diisi !!',
    'geojson.required' => 'Wajib Diisi !!',
]
);
   $data = [
    'kecamatan' => Request()->kecamatan,
    'warna' => Request()->warna,
    'geojson' => Request()->geojson,
];
$this->KecamatanModel->insertData($data);
return redirect()->route('admin.kecamatan')->with('pesan','Kecamatan Berhasil ditambahkan!!');
}
function editKecamatan($id_kecamatan)
{
    $data = [
      'kecamatan' => $this->KecamatanModel->detailData($id_kecamatan),
  ];
  return view('dashboard.admin.kecamatan.v_edit',$data);
}
function updateKecamatan($id_kecamatan)
{
    {
       Request()->validate([
        'kecamatan'=>'required',
        'warna'=>'required',
        'geojson'=>'required',

    ],
    [
        'kecamatan.required' => 'Wajib Diisi !!',
        'warna.required' => 'Wajib Diisi !!',
        'geojson.required' => 'Wajib Diisi !!',
    ]
);
       $data = [
        'kecamatan' => Request()->kecamatan,
        'warna' => Request()->warna,
        'geojson' => Request()->geojson,
    ];
    $this->KecamatanModel->updateData($id_kecamatan, $data);
    return redirect()->route('admin.kecamatan')->with('pesan','Kecamatan Berhasil diubah!!');
}
}
function hapusKecamatan($id_kecamatan)
{
    $this->KecamatanModel->DeleteData($id_kecamatan);
    return redirect()->route('admin.kecamatan')->with('pesan','Kecamatan Berhasil dihapus!!');
}
// End Kecamatan
// Kegiatan
function kegiatan()
{
    $data = [
        'kegiatan' => $this->KegiatanModel->AllData(),
    ];
    return view('dashboard.admin.kegiatan.index', $data);
}
function addKegiatan()
{
    $data = [
        'kecamatan' => $this->KecamatanModel->AllData(),
    ];
    return view('dashboard.admin.kegiatan.v_add', $data);
}
function insertKegiatan(Request $request)
{
   $request->validate([
    'nama_kegiatan'=>'required',
    'foto_kegiatan'=>'required|image|mimes:jpeg,png,jpg|max:1024',
    'id_kecamatan'=>'required',
    'posisi'=>'required',
    'ket'=>'required',
    'waktu'=>'required',
    'jml_anggota'=>'required',
    'alamat'=>'required',

],
[
    'nama_kegiatan.required' => 'Wajib Diisi !!',
    'foto_kegiatan.required' => 'Wajib Diisi !!',
    'foto_kegiatan.max' => 'Foto Max 1024 Kb !!!',
    'foto_kegiatan.image' => 'Foto Harus berformat Jpg, jpeg, dan Png !!!',
    'id_kecamatan.required' => 'Wajib Diisi !!',
    'posisi.required' => 'Wajib Diisi !!',
    'ket.required' => 'Wajib Diisi !!',
    'waktu.required' => 'Wajib Diisi !!',
    'jml_anggota.required' => 'Wajib Diisi !!',
    'alamat.required' => 'Wajib Diisi !!',
]
);

   // Simpan Foto

   $file = Request()->foto_kegiatan;
   $filename = $file->getClientOriginalName();
   $file->move(public_path('foto_kegiatan'), $filename);
   $data = [
    'nama_kegiatan' => Request()->nama_kegiatan,
    'foto_kegiatan' => $filename,
    'id_kecamatan' => Request()->id_kecamatan,
    'posisi' => Request()->posisi,
    'ket' => Request()->ket,
    'waktu' => Request()->waktu,
    'jml_anggota' => Request()->jml_anggota,
    'alamat' => Request()->alamat,
];
$this->KegiatanModel->insertData($data);
return redirect()->route('admin.kegiatan')->with('pesan','Data Kegiatan Berhasil ditambahkan!!');
}
function editKegiatan($id_kegiatan)
{
    $data = [
        'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
        'kecamatan' => $this->KecamatanModel->AllData(),
    ];
    return view('dashboard.admin.kegiatan.v_edit',$data);
}

function updateKegiatan($id_kegiatan)
{
    {
       Request()->validate([
        'nama_kegiatan'=>'required',
        'foto_kegiatan'=>'image|mimes:jpeg,png,jpg|max:1024',
        'id_kecamatan'=>'required',
        'posisi'=>'required',
        'ket'=>'required',
        'waktu'=>'required',
        'jml_anggota'=>'required',
        'alamat'=>'required',

    ],
    [
     'nama_kegiatan.required' => 'Wajib Diisi !!',
     'foto_kegiatan.max' => 'Foto Max 1024 Kb !!!',
     'foto_kegiatan.image' => 'Foto Harus berformat Jpg, jpeg, dan Png !!!',
     'id_kecamatan.required' => 'Wajib Diisi !!',
     'posisi.required' => 'Wajib Diisi !!',
     'ket.required' => 'Wajib Diisi !!',
     'waktu.required' => 'Wajib Diisi !!',
     'jml_anggota.required' => 'Wajib Diisi !!',
     'alamat.required' => 'Wajib Diisi !!',
 ]
);
       if (Request()->foto_kegiatan <>"") {
   // Hapus Foto Lama
        $kegiatan = $this->KegiatanModel->detailData($id_kegiatan);
        if ($kegiatan->foto_kegiatan <> "") {
            unlink(public_path('foto_kegiatan') . '/' . $kegiatan->foto_kegiatan);
        }
//Ganti foto
    $file = Request()->foto_kegiatan;
    $filename = $file->getClientOriginalName();
    $file->move(public_path('foto_kegiatan'), $filename);
    $data = [
        'nama_kegiatan' => Request()->nama_kegiatan,
        'foto_kegiatan' => $filename,
        'id_kecamatan' => Request()->id_kecamatan,
        'posisi' => Request()->posisi,
        'ket' => Request()->ket,
        'waktu' => Request()->waktu,
        'jml_anggota' => Request()->jml_anggota,
        'alamat' => Request()->alamat,
    ];
    $this->KegiatanModel->updateData($id_kegiatan, $data);
}else{
    //Tidak ganti foto
    $data = [
        'nama_kegiatan' => Request()->nama_kegiatan,
        'id_kecamatan' => Request()->id_kecamatan,
        'posisi' => Request()->posisi,
        'ket' => Request()->ket,
        'waktu' => Request()->waktu,
        'jml_anggota' => Request()->jml_anggota,
        'alamat' => Request()->alamat,
    ];
}
$this->KegiatanModel->updateData($id_kegiatan, $data);
return redirect()->route('admin.kegiatan')->with('pesan','Data Kegiatan Berhasil diubah!!');

}
}

function hapuskegiatan($id_kegiatan)
{
    $kegiatan = $this->KegiatanModel->detailData($id_kegiatan);
    if ($kegiatan->foto_kegiatan <> "") {
       unlink(public_path('foto_kegiatan') . '/' . $kegiatan->foto_kegiatan);
    }
    $this->KegiatanModel->deleteData($id_kegiatan);
    return redirect()->route('admin.kegiatan')->with('pesan','Data Kegiatan Berhasil dihapus!!');
}
// End Kegiatan
function profile()
{
    return view('dashboard.admin.profile');
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
        return response()->json(['status'=>0,'msg'=>'Gagal Update Profil, Silahkan Coba Lagi']);
    }else{
        return response()->json(['status'=>1,'msg'=>'Profil Anda telah berhasil di Update.']);
    }
}
}
function updatePicture(Request $request){
   $path = 'users/images/';
   $file = $request->file('admin_image');
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
           return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
       }else{
           return response()->json(['status'=>1,'msg'=>'Foto Profil Anda telah berhasil diperbarui']);
       }
   }
}
    // Data Akun User
function akun()
{
        // $users = DB::select('select * from users where role=1');
    $akun = DB::table('users')->where('role', 2)->get();
    return view('dashboard.admin.akun',compact('akun'));
}
    // Data List Admin
function user()
{
        // $users = DB::select('select * from users where role=1');
    $user = DB::table('users')->where('role', 1)->get();
    return view('dashboard.admin.user',compact('user'));
}
function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.user')->with('pesan','Data Berhasil Di Hapus');
}
function add()
{
    return view('dashboard.admin.v_add_admin');
}
function insertAdmin(Request $request){
    $request->validate([
        'name'=>['required','string','max:255'],
        'email'=>['required','string','email','max:255','unique:users'],
        'password'=>['required','string','min:8','confirmed'],

    ]);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = 1;
    $user->password = \Hash::make($request->password);
    if ($user->save()) {
        return redirect()->route('admin.user')->with('pesan','Data Berhasil di tambahkan');
    }else{
        return redirect()->back()->with('error','Gagal Tambah, Silahkan Coba Lagi');
    }
}
}
// End Data List Admin


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
        return response()->json(['status'=>0,'msg'=>'Gagal Update Kata Sandi']);
    }else{
        return response()->json(['status'=>1,'msg'=>'Kata sandi Anda telah berhasil di update']);
    }
}
}
