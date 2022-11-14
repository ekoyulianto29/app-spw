<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Omset;
use App\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;
use PDF;

class HalLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['data']=DB::table('siswa')->select('id_siswa')->where('id_siswa', '=', Auth::guard('siswa')->user()->id_siswa)->result();
        $data['data']=Siswa::where('id_siswa','=', Auth::guard('siswa')->user()->id_siswa)->get(); 
        return view('siswa.data_laporan',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $td = $request['tahundari'];
        $bd = $request['bulandari'];
        $ts = $request['tahunsampai'];
        $bs = $request['bulansampai'];

        $tmp = $td.$bd;
        $tmp2 = $ts.$bs;

        $data = Omset::join('bulan','bulan.id_bulan','=','omset.bulan')
        ->where('nisn','=',Auth::guard('siswa')->user()->nisn)
        ->where(DB::raw('CONCAT(omset.tahun,omset.bulan)'),'>=', $tmp)
        ->where(DB::raw('CONCAT(omset.tahun,omset.bulan)'), '<=', $tmp2)
        ->orderby('omset.bulan','asc')
        ->orderby('omset.tahun','asc')
        ->get();

        return view('siswa.data_laporan',compact('data'));
    }
    public function cari(Request $request)
    {
        echo "hm";
        // if ($request['tahundari']!=NULL) {
        //     $td = $request['tahundari'];
        // $bd = $request['bulandari'];
        // $ts = $request['tahunsampai'];
        // $bs = $request['bulansampai'];

        // $data['data'] = 
        // Omset::whereBetween('tahun', [$td, $ts])
        // ->orWhereBetween('bulan', [$bd, $bs])
        // ->get();

        // return redirect()->route('hallaporan',$data);
        // } else {
        //     echo "hem";
        // }
    }

    public function edit($id)
    {
        $data['data'] = Siswa::find($id);
        return view('siswa/ubah_siswa',$data);
    }

    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
    public function cetak_pdf(Request $request)
    {

        $data= 
        Omset::join('bulan','bulan.id_bulan','=','omset.bulan')
        ->where('nisn','=', Auth::guard('siswa')->user()->nisn)
        ->orderby('omset.bulan','ASC')
        ->orderby('omset.tahun','ASC')
        ->get();

        $usaha = Usaha::where('nisn','=', Auth::guard('siswa')->user()->nisn)
        ->get();

        $siswa = Siswa::where('nisn','=', Auth::guard('siswa')->user()->nisn)
        ->get();

        $sumOmset = Omset::where('nisn','=', Auth::guard('siswa')->user()->nisn)->sum('omset');

        $pdf = PDF::loadview('siswa/omset_pdf',compact('data','usaha','siswa','sumOmset'));
        return $pdf->download('laporan-omset-pdf');
    }
}
