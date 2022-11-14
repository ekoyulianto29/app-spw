<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Siswa;
use App\Sekolah;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormLogin()
    {
        if (Auth::guard('siswa')->check()) { 
            return redirect()->route('homesiswa');
        }
        return view('loginsiswa');
    }

    public function loginsiswa(Request $request)
    {
        $ru = [
            'nisn'                 => 'required',
            'password'              => 'required|string',
        ];

        $me = [
            'nisn.required'        => 'NISN harus diisi',
            'password.required'     => 'Password harus diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $va = Validator::make($request->all(), $ru, $me);

        if($va->fails()){
            return redirect()->back()->withErrors($va)->withInput($request->all);
        }

        $da = [
            'nisn'     => $request->input('nisn'),
            'password'  => $request->input('password'),
        ];

        Auth::guard('siswa')->attempt($da);

        if (Auth::guard('siswa')->check()) {
            //Login Success
            return redirect()->route('homesiswa');

        } else { // false

            //Login Fail
            Session::flash('error', 'NISN atau Kata Sandi salah!!');
            return redirect()->route('loginsiswa');
        }

    }

    public function showFormLoginSiswa()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('loginsiswa');
    }

    public function showFormRegisterSiswa()
    {
        return view('registersiswa');
    }

    public function registersiswa(Request $request)
    {
        $r = [
         'nisn'              => 'required|unique:siswa,nisn|numeric',
         'npsn'              => 'required|numeric',
         'nama_sekolah'      => 'required',
         'alamat'            => 'required',
         'nama_lengkap'      => 'required|min:3|max:35',
         'password'          => 'required|confirmed',
         'tlp'               => 'required|numeric|min:11',
         'tingkat'           => 'required',
         'kelas'             => 'required',
         'foto'              => 'required|image|mimes:jpg,jpeg,png|max:1048',
         'guru_pembimbing'   => 'required',
         'tlp_guru'          => 'required|numeric|min:11',

     ];

     $m = [
        'nisn.required'      => 'NISN Lengkap harus diisi',
        'nisn.numeric'      => 'NISN harus angka',
        'nisn.unique'        => 'NISN sudah terdaftar',
        'npsn.required'      => 'NPSN Lengkap harus diisi',
        'npsn.numeric'      => 'NPSN harus angka',
        'nama_lengkap.required'  => 'Nama Lengkap harus diisi',
        'nama_lengkap.min'    => 'Nama lengkap minimal 3 karakter',
        'nama_lengkap.max'    => 'Nama lengkap maksimal 35 karakter',
        'password.required'   => 'Password harus diisi',
        'password.confirmed'  => 'Password tidak sama dengan konfirmasi password',
        'tlp.required'        => 'Telepon harus diisi',
        'tlp.numeric'             => 'Telepon harus berupa angka',
        'tlp.min'             => 'Telepon minimal 11 karakter',
        'tingkat.required'    => 'Tingkat harus diisi',
        'kelas.required'      => 'Kelas harus diisi',
        'foto.required'       => 'Foto harus diisi',
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
    $v = Validator::make($request->all(), $r, $m);

    if($v->fails()){
        return redirect()->back()->withErrors($v)->withInput($request->all);
    }

    if ($request->hasfile('foto')) {            
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('gambar'), $filename);


        $siswa = new Siswa;
        $siswa->nisn = strtolower($request->nisn);
        $siswa->npsn = strtolower($request->npsn);
        $siswa->nama_sekolah = strtolower($request->nama_sekolah);
        $siswa->alamat = strtolower($request->alamat);
        $siswa->nama_lengkap = strtolower($request->nama_lengkap);
        $siswa->password = Hash::make($request->password);
        $siswa->tlp = strtolower($request->tlp);
        $siswa->tingkat =strtolower($request->tingkat);
        $siswa->kelas =strtolower($request->kelas);
    // // $siswa->foto =strtolower($request->foto);
        $siswa->foto = $filename;
    // $siswa->path = '/gambar/'.$path;
        $siswa->guru_pembimbing =strtolower($request->guru_pembimbing);
        $siswa->tlp_guru =strtolower($request->tlp_guru);
        $simpan = $siswa->save();

    }

    $sekolah = Sekolah::where('npsn', $request->npsn)->first();
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
   //  $sekolah = Sekolah::updateOrCreate(
   //     ['npsn' => $request->npsn],
   //     ['nama_sekolah' => $request->nama_sekolah],
   // );
 //    $siswa = Siswa::updateOrCreate(
 //     ['npsn' => $request->npsn],
 //     ['nama_sekolah' => $request->nama_sekolah]
 // );
    if($simpan){
        Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
        return redirect()->route('loginsiswa');
    } else {
        Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
        return redirect()->route('registersiswa');
    }
}
public function keluar()
{
    if (Auth::guard('user')->check()) {
     Auth::guard('user')->logout(); 
     return redirect()->route('login');
 } elseif (Auth::guard('siswa')->check()) {
     Auth::guard('siswa')->logout(); 
     return redirect()->route('loginsiswa');
 }
}
public function getSekolah(Request $request)
{
   if($request->get('query'))
   {
      $query = $request->get('query');
      $data = Sekolah::
      where('npsn', 'LIKE', "%{$query}%")
      ->groupBy('nama_sekolah')->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->nama_sekolah.'</a></li>
       ';
   }
   $output .= '</ul>';
   echo $output;
}
}
}