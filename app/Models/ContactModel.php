<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactModel extends Model
{
     public $table = "tbl_contact";
    public function AllData()
    {
        return DB::table('tbl_contact')->get();
    }
    public function insertData($data)
    {
        DB::table('tbl_contact')->insert($data);
    }
    public function detailData($id_contact)
    {
        return DB::table('tbl_contact')->where('id_contact',$id_contact)->first();
    }
    public function updateData($id_contact, $data)
    {
        DB::table('tbl_contact')
        ->where('id_contact',$id_contact)
        ->update($data);
    }
    public function deleteData($id_contact)
    {
        DB::table('tbl_contact')
        ->where('id_contact',$id_contact)
        ->delete();
    }
}
