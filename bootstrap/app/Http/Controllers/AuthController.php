<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        if (Auth::guard('swasta')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai user berhasil
            $user = Auth::guard('swasta')->user();
            // return redirect('/logUser/' . $user->id);
            return redirect('/dashboardSwasta');
        } elseif (Auth::guard('dlh')->attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai admin DLH berhasil
            return redirect('/dashboardDLH');
        } elseif (Auth::guard('klh')->attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai admin KLH berhasil
            return redirect('/dashboardKlh');
        } elseif (Auth::guard('djp')->attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai admin DJP berhasil
            return redirect('/dashboardDJP');
        } elseif (Auth::guard('admin')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai super admin berhasil
            return redirect('/dashboardAdmin');
        }

        return redirect('/portal')->with(['warning' => 'Username atau Password Anda tidak terdaftar.']);
    }

    public function logoutAdmin(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect('/portal')->with(['logout' => 'Anda berhasil Logout.']);
        }
    }



}
