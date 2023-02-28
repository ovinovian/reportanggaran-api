<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SistemLoginController extends Controller
{
    public function register_akun()
    {
        return view('auth.halaman_register');
    }

    public function proses_register(Request $req)
    {
        // dd($req->all());
        $cek_email = User::where('email', '=', $req->email)->count();
        if($cek_email == 1) {
            Session::flash('fail', 'Email anda masukan telah digunakan');
            return redirect('/register');
        } else {
            $validator = Validator::make($req->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);
       
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
       
            $input = $req->all();
            $input['password'] = Hash::make($input['password']);
            $input['uuid'] = (string) Str::uuid();
            $user = User::create($input);


            if($user) {
                Session::flash('success', 'Anda telah berhasil mendaftar, silahkan login !');
                return redirect('/login');
            } else {
                Session::flash('fail', 'Data anda gagal tersimpan');
                return redirect()->back();
            }
        }
    }

    public function halaman_login()
    {
        return view('auth.halaman_login');
    }

    public function login_verifikasi(Request $req)
    {
        $cekUser = User::where('email', $req->email)
        ->first();

        if (!$cekUser || empty($cekUser))
        {
            return back()->with('gagal_login', 'Data Email atau Password anda tidak ditemukan');
        } else {
            $dataUser = $cekUser;
            if (Hash::check($req->password, $cekUser->password)){
                $req->session()->put('username', $cekUser->email);
                $req->session()->put('uuid', $cekUser->nip);
                return redirect()->route('anggaran2.index')->with(['dataUser'=>$dataUser]);
            } else {
                return back()->with('gagal_login', 'Data Email atau Password anda masukan salah');
            }
        }
        
    }

    public function log_out()
    {
        if(session()->has('uuid')){
            session()->pull('uuid');
            session()->pull('username');
            return redirect()->route('login.user')->with('berhasil', 'Selamat tinggal, kamu berhasi keluar');
        }
    }
}
