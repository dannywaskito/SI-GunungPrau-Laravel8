<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\KecamatanModel;
use App\Models\KegiatanModel;
use App\Models\ContactModel;
use App\Models\BeritaModel;
use App\Models\PendakianModel;
use App\Models\PenyewaanModel;

class AdminController extends Controller
{
    public function __construct()
    {
     $this->KecamatanModel = new KecamatanModel();
     $this->KegiatanModel = new KegiatanModel();
     $this->ContactModel = new ContactModel();
     $this->BeritaModel = new BeritaModel();
     $this->PendakianModel = new PendakianModel();
     $this->PenyewaanModel = new PenyewaanModel();
 }
    //
 function index()
 {

    return view('dashboard.admin.index');
}

// Berita
function berita()
{

    $data = [
        'berita' => $this->BeritaModel->AllData(),
    ];
    return view('dashboard.admin.berita.index', $data);
}
function addBerita()
{
    $data = [
        'berita' => $this->BeritaModel->AllData(),
    ];
    return view('dashboard.admin.berita.v_add', $data);
}
function insertBerita(Request $request)
{
   $request->validate([
    'judul'=>'required',
    'foto_berita'=>'required|image|mimes:jpeg,png,jpg|max:1024',
    'isi'=>'required',

],
[
    'judul.required' => 'Wajib Diisi !!',
    'foto_berita.required' => 'Wajib Diisi !!',
    'foto_berita.max' => 'Foto Max 1024 Kb !!!',
    'foto_berita.image' => 'Foto Harus berformat Jpg, jpeg, dan Png !!!',
    'isi.required' => 'Wajib Diisi !!',
]
);

   // Simpan Foto

   $file = Request()->foto_berita;
   $filename = $file->getClientOriginalName();
   $file->move(public_path('foto_berita'), $filename);
   $data = [
    'judul' => Request()->judul,
    'foto_berita' => $filename,
    'isi' => Request()->isi,
];
$this->BeritaModel->insertData($data);
return redirect()->route('admin.berita')->with('pesan','Data Berita Berhasil ditambahkan!!');
}

function editBerita($id_berita)
{
    $data = [
        'berita' => $this->BeritaModel->detailData($id_berita),
    ];
    return view('dashboard.admin.berita.v_edit',$data);
}

function updateBerita($id_berita)
{
    {
       Request()->validate([
        'judul'=>'required',
        'foto_berita'=>'image|mimes:jpeg,png,jpg|max:1024',
        'isi'=>'required',

    ],
    [
    'judul.required' => 'Wajib Diisi !!',
    'foto_berita.required' => 'Wajib Diisi !!',
    'foto_berita.max' => 'Foto Max 1024 Kb !!!',
    'foto_berita.image' => 'Foto Harus berformat Jpg, jpeg, dan Png !!!',
    'isi.required' => 'Wajib Diisi !!',
 ]
);
       if (Request()->foto_berita <>"") {
   // Hapus Foto Lama
        $berita = $this->BeritaModel->detailData($id_berita);
        if ($berita->foto_berita <> "") {
            unlink(public_path('foto_berita') . '/' . $berita->foto_berita);
        }
//Ganti foto
        $file = Request()->foto_berita;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto_berita'), $filename);
        $data = [
            'judul' => Request()->judul,
            'foto_berita' => $filename,
            'isi' => Request()->isi,
        ];
        $this->BeritaModel->updateData($id_berita, $data);
    }else{
    //Tidak ganti foto
        $data = [
            'judul' => Request()->judul,
            'isi' => Request()->isi,
        ];
    }
    $this->BeritaModel->updateData($id_berita, $data);
    return redirect()->route('admin.berita')->with('pesan','Data Berita Berhasil diubah!!');

}
function hapusBerita($id_berita)
{
    $berita = $this->BeritaModel->detailData($id_berita);
    if ($berita->foto_berita <> "") {
       unlink(public_path('foto_berita') . '/' . $berita->foto_berita);
   }
   $this->BeritaModel->deleteData($id_berita);
   return redirect()->route('admin.berita')->with('pesan','Data Berita Berhasil dihapus!!');
}
}
function pendaki()
{
   $pendaki = PendakianModel::with('user')->get();
   $data = [
    'pendaki' => $this->PendakianModel->AllData(),
];
return view('dashboard.admin.pendaki.index', compact('pendaki'),$data);
}
function addPendaki()
{
    $data = [
        'pendaki' => $this->PendakianModel->AllData(),
    ];
    return view('dashboard.admin.pendaki.v_add', $data);
}
function hapusPendaki($id_pendakian)
{
    $pendaki = $this->PendakianModel->detailData($id_pendakian);
   $this->PendakianModel->deleteData($id_pendakian);
   return redirect()->route('admin.pendaki')->with('pesan','Data Pendaki Berhasil dihapus!!');
}
function penyewaan()
{
   $penyewaan = PenyewaanModel::with('user')->get();
   $data = [
    'penyewaan' => $this->PenyewaanModel->AllData(),
];
return view('dashboard.admin.penyewaan.index', compact('penyewaan'),$data);
}
function hapusSewa($id_penyewaan)
{
    $penyewaan = $this->PenyewaanModel->detailData($id_penyewaan);
   $this->PenyewaanModel->deleteData($id_penyewaan);
   return redirect()->route('admin.penyewaan')->with('pesan','Data Penyewaan Berhasil dihapus!!');
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
// End Data List Admin
function contact()
{
    $data = [
        'contact' => $this->ContactModel->AllData(),
    ];
    return view('dashboard.admin.contact.index', $data);
}
function addContact()
{
    $data = [
        'contact' => $this->ContactModel->AllData(),
    ];
    return view('dashboard.admin.contact.v_add', $data);
}

function hapusContact($id_contact)
{
    $contact = $this->ContactModel->detailData($id_contact);
   $this->ContactModel->deleteData($id_contact);
   return redirect()->route('admin.contact')->with('pesan','Data Kontak Berhasil dihapus!!');
}
function editContact($id_contact)
{
    $data = [
        'contact' => $this->ContactModel->detailData($id_contact),
    ];
    return view('dashboard.admin.contact.v_edit',$data);
}

function updateContact($id_contact)
{
    {
       Request()->validate([
        'email'=>'required',
        'notelp'=>'required',

    ],
    [
    'email.required' => 'Wajib Diisi !!',
    'notelp.required' => 'Wajib Diisi !!',
 ]
);
        $data = [
            'email' => Request()->email,
            'notelp' => Request()->notelp,
        ];
    }
    $this->ContactModel->updateData($id_contact, $data);
    return redirect()->route('admin.contact')->with('pesan','Data Contact Berhasil diubah!!');

}
}




  

// end berita





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
