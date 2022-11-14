<?php

namespace App\Http\Controllers;

use App\Omset;
use App\Siswa;
use App\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class HalOmsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data =Omset::where('nisn','=', Auth::guard('siswa')->user()->nisn)->get();
        $data = Omset::join('bulan','bulan.id_bulan','=','omset.bulan')
        ->where('nisn','=', Auth::guard('siswa')->user()->nisn)
        ->orderBy(DB::raw('CONCAT(omset.tahun,omset.bulan)'), 'asc')
        // ->orderBy('omset.tahun','asc')
        // ->orderBy('omset.bulan','asc')
        ->get();
        return view('siswa.data_omset',compact('data'));
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
        $rules = [
            'tahun' => 'required',
            'bulan' => 'required',
            'omset' => 'required|numeric',
            'link_usaha' => 'required|url',
        ];
        $message = [
            'tahun.required' => 'attribute tidak boleh kosong', 
            'bulan.required' => 'attribute tidak boleh kosong', 
            'omset.required' => 'attribute tidak boleh kosong', 
            'omset.numeric' => 'attribute harus angka', 
            'link_usaha.required' => 'attribute tidak boleh kosong',  
            'link_usaha.url' => 'url tidak sesuai',       
        ];
        $va = Validator::make($request->all(), $rules, $message);
        if($va->fails()){
            return redirect()->back()->withErrors($va)->withInput($request->all);
        }

        $data2 = Usaha::get(); 
        $a = Auth::guard('siswa')->user()->nisn;
        $ambilIdUsaha = Usaha::where('nisn','=',Auth::guard('siswa')->user()->nisn)->select('id_usaha')->get();

        foreach($data2 as $d)
        {
            $cek = $d->nisn;

            foreach($ambilIdUsaha as $i)
            {
                $id_u = $i->id_usaha;

                if ($cek == $a) {
                    if($request->omset <= 0){
                    Session::flash('gagal', 'Data omset tidak boleh kurang dari sama dengan 0');
                    return redirect()->route('omset.index');
                    } else {
                    $data = new Omset;
                    $data->id_usaha = $id_u;
                    $data->nisn=$request->nisn;
                    $data->tahun=$request->tahun;
                    $data->bulan=$request->bulan;
                    $data->omset=$request->omset;
                    $data->link_usaha=$request->link_usaha;
                    $data->save();
                    Session::flash('sukses', 'Data Berhasil di Tambahkan');
                    return redirect()->route('omset.index');
                }
                } 
            } 
        } 
        
        
        Session::flash('gagal', 'Nama usaha anda belum terdaftar! silahkan daftarkan terlebih dahulu ya');
        return redirect()->route('omset.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $data['data']=Siswa::find($id);

        return view('siswa.ubah_siswa', $data);
    }

    public function edit($id)
    {
        $data = Omset::join('bulan','bulan.id_bulan','=','omset.bulan')->where('nisn','=', Auth::guard('siswa')->user()->nisn)->find($id);
        return view('siswa/ubah_omset',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'tahun' => 'required',
            'bulan' => 'required',
            'omset' => 'required|numeric',
            'link_usaha' => 'required|url',
        ];
        $message = [
            'tahun.required' => 'attribute tidak boleh kosong', 
            'bulan.required' => 'attribute tidak boleh kosong', 
            'omset.required' => 'attribute tidak boleh kosong', 
            'omset.numeric' => 'attribute harus angka', 
            'link_usaha.required' => 'attribute tidak boleh kosong',  
            'link_usaha.url' => 'url tidak sesuai',       
        ];
        $va = Validator::make($request->all(), $rules, $message);
        if($va->fails()){
            return redirect()->back()->withErrors($va)->withInput($request->all);
        }
        if($request->omset <= 0){
            Session::flash('gagal', 'Data omset tidak boleh kurang dari sama dengan 0');
            return redirect()->route('omset.index');
            } else {
            
        $data = Omset::find($id);
        $data->id_usaha=$request->id_usaha;
        $data->nisn=$request->nisn;
        $data->tahun=$request->tahun;
        $data->bulan=$request->bulan;
        $data->omset=$request->omset;
        $data->link_usaha=$request->link_usaha;
        $data->update();
        Session::flash('sukses', 'Data Berhasil diubah');
        return redirect()->route('omset.index');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Omset::find($id);
        $data->delete();
        Session::flash('sukses', 'Data Berhasil dihapus');
        return redirect()->route('omset.index');
    }
}
