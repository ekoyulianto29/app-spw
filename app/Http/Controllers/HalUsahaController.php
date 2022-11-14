<?php

namespace App\Http\Controllers;

use App\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class HalUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['data']=DB::table('siswa')->select('id_siswa')->where('id_siswa', '=', Auth::guard('siswa')->user()->id_siswa)->result();
        $data['data']=Usaha::where('nisn','=', Auth::guard('siswa')->user()->nisn)->get(); 
        $cek['cek']=Usaha::where('nisn','=', Auth::guard('siswa')->user()->nisn)->count();
        return view('siswa.data_usaha',$data,$cek);
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
            'nama_usaha' => 'required',
            'tlp' => 'required|numeric',
            'alamat' => 'required',
        ];
        $message = [
            'nama_usaha.required' => '* tidak boleh kosong', 
            'tlp.required' => '*  tidak boleh kosong',
            'tlp.numeric' => '* harus angka',  
            'alamat.required' => '* tidak boleh kosong',       
        ];
        $va = Validator::make($request->all(), $rules, $message);
        if($va->fails()){
            return redirect()->back()->withErrors($va)->withInput($request->all);
        }

        $data = Usaha::get(); 
        $a = Auth::guard('siswa')->user()->nisn;

        foreach($data as $d)
        {
            $cek = $d->nisn;
            //echo $cek,"<br>";

            if ($cek == $a) {
                Session::flash('errors', 'Hanya bisa menambahkan 1 usaha saja');
                return redirect()->route('usaha.index');
                //echo "ga bisa<br>",$cek,"<br>",$a;
            } 
        }

        Usaha::create([
            'nama_usaha' => $request['nama_usaha'],
            'tlp' => $request['tlp'],
            'alamat' => $request['alamat'],
            'nisn' => $request['nisn'],
        ]);
        Session::flash('success', 'Data berhasil ditambah');                
        Session::flash('errors', 'Hanya bisa menambahkan 1 usaha saja');

        
        return redirect()->route('usaha.index');
        
    }
    public function show(Siswa $siswa)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Usaha::find($id);
        return view('siswa/ubah_usaha',compact('data'));
    }

    public function update(Request $request, $id)
    {
$rules = [
            'nama_usaha' => 'required',
            'tlp' => 'required|numeric',
            'alamat' => 'required',
        ];
        $message = [
            'nama_usaha.required' => ':attribute tidak boleh kosong', 
            'tlp.required' => ':attribute tidak boleh kosong',
            'tlp.numeric' => ':attribute harus angka',  
            'alamat.required' => ':attribute tidak boleh kosong',       
        ];
        $va = Validator::make($request->all(), $rules, $message);
        if($va->fails()){
            return redirect()->back()->withErrors($va)->withInput($request->all);
        }

        $data = Usaha::find($id);
        $data->nama_usaha=($request->nama_usaha);
        $data->tlp=($request->tlp);
        $data->alamat=($request->alamat);
        $data->update();
        Session::flash('errors', 'Hanya bisa menambahkan 1 usaha saja');
        Session::flash('success', 'Data berhasil diubah');
        return redirect()->route('usaha.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Usaha::join('omset','usaha.nisn','=','omset.nisn')->find($id);
        $data->delete();
        Session::flash('sukses', 'Data Berhasil dihapus');
        return redirect()->route('usaha.index');
    }
}
