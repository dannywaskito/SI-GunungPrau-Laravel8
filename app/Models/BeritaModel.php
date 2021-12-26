<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeritaModel extends Model
{
  public $table = "tbl_berita";
    public function AllData()
    {
        return DB::table('tbl_berita')->get();
    }
    public function insertData($data)
    {
        DB::table('tbl_berita')->insert($data);
    }
    public function detailData($id_berita)
    {
        return DB::table('tbl_berita')->where('id_berita',$id_berita)->first();
    }
    public function updateData($id_berita, $data)
    {
        DB::table('tbl_berita')
        ->where('id_berita',$id_berita)
        ->update($data);
    }
    public function deleteData($id_berita)
    {
        DB::table('tbl_berita')
        ->where('id_berita',$id_berita)
        ->delete();
    }
    public function DetailBerita($id_berita)
    {
         return DB::table('tbl_berita')
        ->where('id_berita', $id_berita)
         ->first();
    }
}
