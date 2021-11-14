<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;


class WebController extends Controller
{
     public function __construct()
     {
        $this->WebModel = new WebModel();
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
}
