<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('user/login');
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->ROLE == 'customer') {
                return redirect('/dashboard');
            } else if (Auth::user()->ROLE == 'mix') {
                return redirect()->route('dashboard');
            }
        }
        return redirect('/login')->with('alert_danger', 'Username/Password Anda Salah');
    }

    // public function redirectTo()
    // {
    //     $role = Auth::user()->ROLE;
    //     switch ($role) {
    //         case 'customer':
    //             return '/dashboard';
    //             break;
    //         case 'mix':
    //             return '/dashboard';
    //             break;
    //         default:
    //             return '/';
    //             break;
    //     }
    // }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
