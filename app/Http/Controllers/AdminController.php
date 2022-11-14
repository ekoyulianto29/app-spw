<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::all(); 
        $cek=User::count();
        return view('admin/data_admin',compact('data','cek'));
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
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'username'              => 'required',
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'username.required'        => 'Username wajib diisi'
        ];

        
        $request->validate($rules, $messages);

        $siswa = new User;
        $siswa->name = ucwords(strtolower($request->name));
        $siswa->email = strtolower($request->email);
        $siswa->password = Hash::make($request->password);
        $siswa->username =strtolower($request->username);
        $siswa->email_verified_at = \Carbon\Carbon::now();
        $simpan = $siswa->save();

        Session::flash('message1', 'Berhasil');
        Session::flash('message', 'Data Berhasil di Tambahkan');
        Session::flash('type', 'success');
        Session::flash('icon', 'icon fa-check');
        return redirect()->route('kelola_admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::get();
        return view('admin/data_akun',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=User::find($id);

        return view('admin.ubah_admin', $data);
    }

    public function editakun($id)
    {
        $data['data']=User::find($id);

        return view('admin.ubah_akun', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email',
            'password'              => 'required',
            'username'              => 'required',
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'username.required'        => 'Username wajib diisi'
        ];

        
        $request->validate($rules, $messages);

        $admin = User::find($id);
        $admin->name = ($request->name);
        $admin->email = ($request->email);
        $admin->password = Hash::make($request->password);
        $admin->username =($request->username);
        $admin->email_verified_at = \Carbon\Carbon::now();
        $admin->update();
        return redirect()->route('data_admin');

    }

    public function updateakun(Request $request, $id)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email',
            'password'              => 'required',
            'username'              => 'required',
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'username.required'        => 'Username wajib diisi'
        ];

        
        $request->validate($rules, $messages);

        $admin = User::find($id);
        $admin->name = ($request->name);
        $admin->email = ($request->email);
        $admin->password = Hash::make($request->password);
        $admin->username =($request->username);
        $admin->email_verified_at = \Carbon\Carbon::now();
        $admin->update();
        Session::flash('success', 'Data Berhasil di Ubah');
        return redirect()->route('akunadmin');

    }

    public function destroy($id)
    {
    $data = User::find($id);
    $data->delete();
    Session::flash('message', 'User Berhasil dihapus');
    Session::flash('type', 'success');
    Session::flash('icon', 'icon fa-check');
    return redirect()->route('kelola_admin.index');
   }
}
