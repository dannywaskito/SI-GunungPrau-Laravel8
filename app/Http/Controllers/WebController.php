<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use App\Models\User;
use App\Models\Kritik;
use Auth;


class WebController extends Controller
{
     public function __construct()
     {
        $this->WebModel = new WebModel();
         $this->User = new User();
          $this->Kritik = new Kritik();
   }
   public function index()
   {
      $data = [
          'title' => 'Aplikasi Rekam Jejak Dokumentasi Kegiatan IMAPALA UHAMKA',
          'kecamatan' => $this->WebModel->DataKecamatan(),
          'kegiatan' => $this->WebModel->AllDataKegiatan(),
     ];
     return view('layouts.v_web', $data);
}

public function kecamatan($id_kecamatan)
{
     $kec = $this->WebModel->DetailKecamatan($id_kecamatan);
     $data = [
          'title' =>'Kecamatan ' . $kec->kecamatan,
          'kecamatan' => $this->WebModel->DataKecamatan(),
          'kegiatan' => $this->WebModel->DataKegiatan($id_kecamatan),
          'kec' => $kec,
     ];
     return view('layouts.v_kecamatan', $data);
}
public function detailkegiatan($id_kegiatan)
{    $kegiatan = $this->WebModel->DetailDataKegiatan($id_kegiatan);
    $data = [
     'title' =>'Detail Kegiatan '. $kegiatan->nama_kegiatan,
     'kecamatan' => $this->WebModel->DataKecamatan(),
     'kegiatan' => $kegiatan,
];
return view('layouts.v_detailkegiatan', $data);
}
public function listkegiatan()
   {
     
      $data = [
          'title' => 'List Gallery Kegiatan IMAPALA UHAMKA',
          'kecamatan' => $this->WebModel->DataKecamatan(),
          'kegiatan' => $this->WebModel->AllDataKegiatan(),
     ];
     return view('layouts.v_list', $data);

}
public function kritik()
   {
     
      $data = [
          'title' => 'Kritik & Saran',
         
     ];
     return view('layouts.v_kritik', $data);

}
function insertKritik(Request $request){
    $request->validate([
        'pesan'=>['required'],

    ]);
    $kritik = new Kritik();
    $kritik->pesan = $request->pesan;
    $kritik->user_id = Auth::user()->id;
    if ($kritik->save()) {
        return redirect()->route('kritik')->with('pesan','Pesan Anda Berhasil di Kirim');
    }else{
        return redirect()->back()->with('error','Gagal Kirim, Silahkan Coba Lagi');
    }
}
}
