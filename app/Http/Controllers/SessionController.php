<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }

    function login(Request $request)
    {
        FacadesSession::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin))
        {
            //Jika Autentikasi Sukses
            return redirect('Contact')->with('success', 'Berhasil Login');
        }else
        {
            // Jika Autentikasi Gagal
            return redirect('sesi')->withErrors('email dan Password tidak Valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        FacadesSession::flash('email', $request->email);
        $request->validate([
            'email'=>'required|unique:users',
            'password'=>'required|min:6'
        ],
        [
            'email.required'=>'email wajib diisi!',
            'email.unique'=>'email sudah pernah digunakan!',
            'password.required'=>'Password wajib diisi!',
            'password.min'=>'Password minimal 6 karakter!'
        ]);

        $data = [
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin))
        {
            //Jika Autentikasi Sukses
            return redirect('Contact')->with('success', Auth::user()->email.' Berhasil Login');
        }else
        {
            // Jika Autentikasi Gagal
            return redirect('sesi')->withErrors('email dan Password tidak Valid');
        }
    }
}
