<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Omset;
use App\Siswa;
use App\Usaha;
use App\Admin;
use App\Rank;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
  public function index()
  {
   
   $os = Omset::all();        
   $tomset = [];
   $tahun = [];
   foreach($os as $o => $value){
      $tomset[$o] = $value->omset;
      $tahun[$o] = $value->tahun;

   }
   //echo $os;
   $omset = Omset::all()->sum('omset');
   $omsetTertinggi = Omset::all()->max('omset');
   $siswa = Siswa::all()->count();
   $usaha = Usaha::all()->count();
   $admin = Admin::all()->count();
   $rank = Rank::all();

   return view('admin.home',compact('omset','siswa','usaha','admin','tahun','tomset','omsetTertinggi','rank'));
}
}