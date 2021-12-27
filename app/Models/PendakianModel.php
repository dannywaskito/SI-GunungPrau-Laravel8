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
    public function detailData($id_pendakian)
    {
        return DB::table('tbl_pendaki')->where('id_pendakian',$id_pendakian)->first();
    }
    public function updateData($id_pendakian, $data)
    {
        DB::table('tbl_pendaki')
        ->where('id_pendakian',$id_pendakian)
        ->update($data);
    }
    public function deleteData($id_pendakian)
    {
        DB::table('tbl_pendaki')
        ->where('id_pendakian',$id_pendakian)
        ->delete();
    }

    // Relasi Dengan Tabel User
    public function user()
    {
       return $this->belongsTo(User::class);
   }
}
