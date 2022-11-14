<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Omset;
use App\Sekolah;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Validator;

class HalSiswaController extends Controller
{

    public function index()
    {
        $data = Omset::where('nisn','=', Auth::guard('siswa')->user()->nisn)->sum('omset');

        $users = Siswa::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count'); 

        $os = Omset::where('nisn','=', Auth::guard('siswa')->user()->nisn)->orderby('tahun','asc')->get(); 
        //$tahun = Omset::select('tahun')->get();       
        $omset = [];
        $tahun = [];
        foreach($os as $o => $value){
            $omset[$o] = $value->omset;
            $tahun[$o] = $value->tahun;
            
            // echo $omset[$o],'<br>';
            // echo $tahun[$o],'<br>';
        }
        return view('siswa.home',
            compact('data','omset','tahun'));    }

        public function home()
        {
            $data['data']=Siswa::where('id_siswa','=', Auth::guard('siswa')->user()->id_siswa)->get(); 
            return view('siswa.data_siswa',$data);
        }

        public function akun()
        {
            $data['data']=Siswa::where('id_siswa','=', Auth::guard('siswa')->user()->id_siswa)->get(); 
            return view('siswa.data_akun',$data);
        }


        public function create()
        {
        //
        }

        public function store(Request $request)
        {
        //
        }


        public function show(Siswa $siswa)
        {
            $data['data']=Siswa::find($id);

            return view('siswa.ubah_siswa', $data);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Siswa::find($id);
        return view('siswa/ubah_siswa',$data);
    }

    public function editakun($id)
    {
        $data['data'] = Siswa::find($id);
        return view('siswa/ubah_akun',$data);
    }

    public function update(Request $request, $id)
    {

        $rules = [
           'nisn'              => 'required|numeric',
           'npsn'              => 'required|numeric',
           'nama_sekolah'      => 'required',
           'alamat'            => 'required',
           'nama_lengkap'      => 'required|min:3|max:35',
           'tlp'               => 'required|numeric|min:11',
           'tingkat'           => 'required',
           'kelas'             => 'required',
           'foto'              => 'image|mimes:jpg,jpeg,png|max:1048',
           'guru_pembimbing'   => 'required',
           'tlp_guru'          => 'required|numeric|min:11',

       ];

       $message = [
        'nisn.required'      => 'NISN Lengkap harus diisi',
        'nisn.numeric'      => 'NISN harus angka',
        'npsn.required'      => 'NPSN Lengkap harus diisi',
        'npsn.numeric'      => 'NPSN harus angka',
        'nama_lengkap.required'  => 'Nama Lengkap harus diisi',
        'nama_lengkap.min'    => 'Nama lengkap minimal 3 karakter',
        'nama_lengkap.max'    => 'Nama lengkap maksimal 35 karakter',
        'tlp.required'        => 'Telepon harus diisi',
        'tlp.numeric'             => 'Telepon harus berupa angka',
        'tlp.min'             => 'Telepon minimal 11 karakter',
        'tingkat.required'    => 'Tingkat harus diisi',
        'kelas.required'      => 'Kelas harus diisi',
        'foto.mimes'       => 'Foto harus berupa JPG, JPEG, PNG',
        'foto.image'       => 'Foto harus berupa gambar (JPG, JPEG, PNG)',
        'foto.max'       => 'Foto maksimal ukuran 1024 KB',
        'guru_pembimbing.required' => 'Guru Pembimbing harus diisi',
        'tlp_guru.required'   => 'Telepon harus diisi',
        'tlp_guru.min'        => 'Telepon minimal 11 karakter',
        'tlp_guru.max'        => 'Telepon maksimal 13 karakter',
        'nama_sekolah.required'   => 'Nama Sekolah harus diisi',
        'alamat.required'   => 'Alamat Sekolah harus diisi',

    ];
    $va = Validator::make($request->all(), $rules, $message);
    if($va->fails()){
        return redirect()->back()->withErrors($va)->withInput($request->all);
    }

    $sekolah = Sekolah::where('npsn','=', $request->npsn)->first();
    if (!is_null($sekolah)) {
        $sekolah->update([
            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah
        ]);
    }else{
        $sekolah = Sekolah::create([
           'npsn' => $request->npsn,
           'nama_sekolah' => $request->nama_sekolah,
           'alamat' => $request->alamat
       ]);
    }
    
    $data = Siswa::find($id);
    if ($request->hasfile('foto')) {            
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('gambar'), $filename);
        
    $data->foto = $filename;
    }
    // $foto_nama = null;
    // if ($request->hasFile('foto')) {
    //     $foto_nama  = $this->uploadFoto($request, $foto_nama);

    //     $siswa->foto = $foto_nama;

    // }
    $data->id_siswa=$request->id_siswa;
    $data->nisn=$request->nisn;
    $data->npsn=$request->npsn;
    $data->nama_sekolah=$request->nama_sekolah;
    $data->alamat=$request->alamat;
    $data->nama_lengkap=$request->nama_lengkap;
    $data->password=$request->password;
    $data->tlp=$request->tlp;
    $data->tingkat=$request->tingkat;
    $data->kelas=$request->kelas;
    $data->guru_pembimbing=$request->guru_pembimbing;
    $data->tlp_guru=$request->tlp_guru;
    $simpan = $data->update();

    // Session::flash('success', 'Data berhasil diubah!');
    // return redirect()->route('d_siswa');
    if($simpan){
        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->route('d_siswa');
    } else {
        Session::flash('errors', ['' => 'Data gagal diubah!']);
        return redirect()->route('d_siswa');
    }
    

}

private function uploadFoto(Request $request, $foto_user_old)
{
    $foto_user = $request->file('foto');
    $ext         = $foto_user->getClientOriginalExtension();
    if ($request->file('foto')->isValid()) {
        $foto_nama   = date('Ymdhis') . "." . $ext;
        $image_resize = Image::make($foto_user->getRealPath());
        $image_resize->save('gambar/' . $foto_nama);
        if ($foto_user_old != null) {
            $path_old = 'gambar/' . $foto_user_old;
            @unlink($path_old);
        }
        return $foto_nama;
    }
    return $foto_user_old;
}
public function updatesandi(Request $request, $id)
{
    $rules = [
        'password'              => 'required|confirmed',
    ];
    $message = [
     'password.required'     => 'Password wajib diisi',
     'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',      
 ];
 $request->validate($rules, $message);

 $data = Siswa::find($id);
 $data->password = Hash::make($request->password);
 $data->update();
 Session::flash('success', 'Kata sandi diubah!');
 return redirect()->route('akun');
}
public function destroy(Siswa $siswa)
{
        //
}
}
