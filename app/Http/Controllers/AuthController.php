<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()  {
        return view('auth/login');
    }
    function register()  {
        return view('auth/register');
    }
    function register_submit(Request $request)  {
        $user=new User();
        $user->nama=$request->nama;
        $user->password=bcrypt($request->password);
        $user->email=$request->email;
        $user->level="calon_santri";
        $user->save();
        return redirect("/login")->with("sukses","registrasi anda berhasil silakan login dengan email dan password");
    }
    function login_submit(Request $request)  {
       $data=$request->only("email","password");
       if (Auth::attempt($data)) {
            return redirect("/app/dashboard");
       } else {
            return redirect("/login")->with("eror","email atau password salah");
       }
    }
    function logout()  {
        Auth::logout();
        return redirect("/login");
    }
}
