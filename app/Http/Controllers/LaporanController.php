<?php

namespace App\Http\Controllers;

use App\Omset;
use App\Siswa;
use App\Sekolah;
use App\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;use 
App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')->orderby('omset.tahun','asc')->get(); 
        return view('admin/laporan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cari = $request['cari'];
        if ($cari='semua') {
            $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')->get();
        } elseif ($cari='asal_sekolah'){
            $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')
            ->where('omset.','=','asal_sekolah')
            ->get();
        } elseif ($cari='tingkat'){
            $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')
            ->where('siswa.tingkat','=','tingkat')
            ->select('siswa.tingkat','omset.*')
            ->get();
        } elseif ($cari='kelas'){
            $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')
            ->where('siswa.kelas','=','kelas')
            ->select('siswa.kelas')
            ->get();
        }

    //$pdf = PDF::loadview('siswa/omset_pdf',compact('data'));
        return view('admin.laporan',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $cari = $request['cari'];
      if ($cari='semua') {
        $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')->get();
    } elseif ($cari='asal_sekolah'){
        $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')
        ->where('omset.','=','asal_sekolah')
        ->get();
    } elseif ($cari='tingkat'){
        $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')
        ->where('omset.tingkat','=','tingkat')
        ->get();
    } elseif ($cari='kelas'){
        $data = Siswa::join('omset','omset.nisn','=','siswa.nisn')
        ->where('omset.kelas','=','kelas')
        ->get();
    }

    //$pdf = PDF::loadview('siswa/omset_pdf',compact('data'));
    return view('admin.laporan',compact('data'));

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    public function cetak_pdf(Request $request)
    {

        // $data= 
        // Usaha::join('siswa','usaha.nisn','=','siswa.nisn')
        // ->join('omset','omset.nisn','=','siswa.nisn')
        // ->join('sekolah','sekolah.npsn','=','siswa.npsn')
        // ->join('bulan','bulan.id_bulan','=','omset.bulan')
        // ->where('usaha.id_usaha','=','omset.id_usaha')
        // ->groupby('usaha.id_usaha')
        // ->orderby('omset.tahun','ASC')
        // ->get();

        $data = 
        Siswa::join('usaha','usaha.nisn','=','siswa.nisn')
        ->JOIN('omset','omset.nisn','=','siswa.nisn')
        ->JOIN('sekolah', 'sekolah.npsn','=','siswa.npsn')
        //->where('usaha.nisn','=','siswa.nisn')
        //>select('siswa.nama_lengkap')
        //->orderby('usaha.id_usaha')
        ->get();
        //$data = $data->sortByDesc('usaha.id_usaha');
        
        $jumlahsiswa = Siswa::count('id_siswa');
        $jumlahsekolah = Sekolah::count('id_sekolah');
        $jumlahusaha = Usaha::count('id_usaha');

        $sumOmset = Omset::sum('omset');
        //$sumOmsetSiswa = Omset::where()sum('omset');

        $pdf = PDF::loadview('admin/pdf_laporan',compact('data','jumlahsiswa','jumlahsekolah','sumOmset','jumlahusaha'));

        return $pdf->download('Laporan_SPW');
    }

    public function export_excel()
    {
        return Excel::download(new DataExport, 'Laporan_SPW.xlsx');
    }
}
