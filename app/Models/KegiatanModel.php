<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KegiatanModel extends Model
{
   public function AllData()
    {
        return DB::table('tbl_kegiatan')
        ->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','tbl_kegiatan.id_kecamatan')
        ->get();
    }

    public function insertData($data)
    {
        DB::table('tbl_kegiatan')->insert($data);
    }

    public function detailData($id_kegiatan)
    {
        return DB::table('tbl_kegiatan')
        ->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan','=','tbl_kegiatan.id_kecamatan')
        ->where('id_kegiatan',$id_kegiatan)->first();
    }
    public function updateData($id_kegiatan, $data)
    {
        DB::table('tbl_kegiatan')
        ->where('id_kegiatan',$id_kegiatan)
        ->update($data);
    }

    public function deleteData($id_kegiatan)
    {
        DB::table('tbl_kegiatan')
        ->where('id_kegiatan',$id_kegiatan)
        ->delete();
    }
}
