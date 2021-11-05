<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KecamatanModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_kecamatan')->get();
    }
    public function insertData($data)
    {
        DB::table('tbl_kecamatan')->insert($data);
    }
    public function detailData($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')->where('id_kecamatan',$id_kecamatan)->first();
    }
    public function updateData($id_kecamatan, $data)
    {
        DB::table('tbl_kecamatan')
        ->where('id_kecamatan',$id_kecamatan)
        ->update($data);
    }
    public function deleteData($id_kecamatan)
    {
        DB::table('tbl_kecamatan')
        ->where('id_kecamatan',$id_kecamatan)
        ->delete();
    }
}
