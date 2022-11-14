<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Omset;
use App\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data=Siswa::where('id_siswa','=', Auth::guard('siswa')->user()->id_siswa)->get(); 
        $cari=Siswa::join('usaha','usaha.nisn','=','siswa.nisn')
        ->where('siswa.nisn','!=','usaha.nisn')->get();
        $data=Siswa::get()->sortByDesc('id_siswa'); 
        
        //return $cari;
         return view('admin/data_siswa',compact('data','cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tambah_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $data = Siswa::join('sekolah','sekolah.npsn','=','siswa.npsn')
      ->leftjoin('usaha','usaha.nisn','=','siswa.nisn')
      ->leftjoin('omset','siswa.nisn','=','omset.nisn')
      ->leftjoin('bulan','bulan.id_bulan','=','omset.bulan')
      ->select('siswa.*','sekolah.*','usaha.nama_usaha','usaha.tlp as tlpusaha','omset.tahun','omset.bulan','omset.omset','omset.updated_at as up','bulan.bulan')
      ->find($id);

      $omsetSiswa = Omset::join('siswa','siswa.nisn','=','omset.nisn')->where('siswa.id_siswa','=',$id)->sum('omset');
      $data2 = Omset::join('bulan','bulan.id_bulan','=','omset.bulan')->join('siswa','siswa.nisn','=','omset.nisn')->where('siswa.id_siswa','=',$id)->get();

      
   // $omsetTertinggi = Omset::all()->max('omset');

      $collection = collect(Omset::orderBy('omset', 'DESC')->join('siswa','omset.nisn','=','siswa.nisn')->get());

      $datarank       = $collection->where('siswa.id_siswa', '=' ,'$id');
      
        $r      = $datarank->keys()->first() + 1;

      $rangking = $r;

      //echo $c;

     return view('admin.detail_siswa', compact('data','omsetSiswa','data2','rangking'));      
  }

  public function getRanking(){
   $collection = collect(Omset::orderBy('omset', 'DESC')->join('siswa','omset.nisn','=','siswa.nisn')->get());
      $datarank       = $collection->where('siswa.id_siswa', '=' ,'$id');
      $value      = $datarank->keys()->first() + 1;
   return $value;
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::find($id);
        $data->delete();
        Session::flash('message', 'User Berhasil dihapus');
        Session::flash('type', 'success');
        Session::flash('icon', 'icon fa-check');
        return redirect()->route('kelola_siswa.index');
    }
}
