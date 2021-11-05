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
}
