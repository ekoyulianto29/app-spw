<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;


class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
}

public function showFormLogin()
{
        if (Auth::guard('user')->check()) { 
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::guard('user')->attempt($data);

        if (Auth::guard('user')->check()) { 
            return redirect()->route('home');

        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }

    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
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

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $siswa = new User;
        $siswa->name = ucwords(strtolower($request->name));
        $siswa->email = strtolower($request->email);
        $siswa->password = Hash::make($request->password);
        $siswa->username =strtolower($request->username);
        $siswa->email_verified_at = \Carbon\Carbon::now();
        $simpan = $siswa->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        if (Auth::guard('user')->check()) {
         Auth::guard('user')->logout(); 
         return redirect()->route('login');
     } elseif (Auth::guard('siswa')->check()) {
         Auth::guard('siswa')->logout(); 
         return redirect()->route('loginsiswa');
     }
 }


}