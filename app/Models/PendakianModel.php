<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PendakianModel extends Model
{
     public $table = "tbl_pendaki";
    public function AllData()
    {
        return DB::table('tbl_pendaki')->get();
    }
    public function insertData($data)
    {
        DB::table('tbl_pendaki')->insert($data);
    }
    public function detailData($id_pendaki)
    {
        return DB::table('tbl_pendaki')->where('id_pendaki',$id_pendaki)->first();
    }
    public function updateData($id_pendaki, $data)
    {
        DB::table('tbl_pendaki')
        ->where('id_pendaki',$id_pendaki)
        ->update($data);
    }
    public function deleteData($id_pendaki)
    {
        DB::table('tbl_pendaki')
        ->where('id_pendaki',$id_pendaki)
        ->delete();
    }

    // Relasi Dengan Tabel User
    public function user()
    {
       return $this->belongsTo(User::class);
   }
}
