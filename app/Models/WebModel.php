<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{
     public function DataKecamatan()
    {
        return DB::table('tbl_kecamatan')->get();
    }

     public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
        ->where('id_kecamatan',$id_kecamatan)
        ->first();
    }

    public function DataKegiatan($id_kecamatan)
    {
         return DB::table('tbl_kegiatan')
        ->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','tbl_kegiatan.id_kecamatan')
        ->where('tbl_kegiatan.id_kecamatan', $id_kecamatan)
        ->get();
    }
    
    public function AllDataKegiatan()
    {
         return DB::table('tbl_kegiatan')
        ->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','tbl_kegiatan.id_kecamatan')
        ->get();
    }

    public function DetailDataKegiatan($id_kegiatan)
    {
         return DB::table('tbl_kegiatan')
        ->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','tbl_kegiatan.id_kecamatan')
        ->where('id_kegiatan', $id_kegiatan)
         ->first();
    }

}
