<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenyewaanModel extends Model
{
     public $table = "tbl_penyewaan";
    public function AllData()
    {
        return DB::table('tbl_penyewaan')->get();
    }
    public function insertData($data)
    {
        DB::table('tbl_penyewaan')->insert($data);
    }
    public function detailData($id_penyewaan)
    {
        return DB::table('tbl_penyewaan')->where('id_penyewaan',$id_penyewaan)->first();
    }
    public function updateData($id_penyewaan, $data)
    {
        DB::table('tbl_penyewaan')
        ->where('id_penyewaan',$id_penyewaan)
        ->update($data);
    }
    public function deleteData($id_penyewaan)
    {
        DB::table('tbl_penyewaan')
        ->where('id_penyewaan',$id_penyewaan)
        ->delete();
    }

    // Relasi Dengan Tabel User
    public function user()
    {
       return $this->belongsTo(User::class);
   }
}
