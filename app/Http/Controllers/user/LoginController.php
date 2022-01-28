<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Crypt;
use DB;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('user/login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = DB::table('user')->where('EMAIL',$email)->first();
        if($data){
            $pass = Crypt::decryptString($data->PASSWORD);
            if($pass == $password){
                Session::put('role',$data->ROLE);
                Session::put('id',$data->ID_USER);
                Session::put('email',$data->EMAIL);
                Session::put('login',TRUE);
                if($data->ROLE == '4'){
                    Session::put('customer',TRUE);
                    return redirect('dashboard');
                }else if($data->ROLE == '2'){
                    Session::put('umum',TRUE);
                    return redirect('dashboard');
                }else if($data->ROLE == '1'){
                    Session::put('petani',TRUE);
                    return redirect('dashboard');
                }
            }else{
                return redirect('/login')->with('alert','Password yang anda masukkan salah.');
            }
        }else{
            return redirect('/login')->with('alert','Email tidak terdaftar.');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('alert-success','Anda berhasil logout');
    }
}
