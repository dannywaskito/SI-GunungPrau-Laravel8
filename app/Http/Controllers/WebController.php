<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use App\Models\User;
use Auth;


class WebController extends Controller
{
     public function __construct()
     {
        $this->WebModel = new WebModel();
   }
   public function index()
   {
      $data = [
          'title' => 'Website Pendakian Gunung Prau (Via Kalilembu)',
     ];
     return view('layouts.v_web', $data);
}
}
