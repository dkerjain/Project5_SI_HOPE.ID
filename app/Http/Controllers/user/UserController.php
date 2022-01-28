<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\Customer;
use Illuminate\Support\Facades\Crypt;
use DB;

class UserController extends Controller
{
    //
    public function index(){
        return view ('/user/register');
    }

    public function store(Request $request){
        $request->validate([
            'username'=>'required|unique:user',
            'password'=>'required',
            'email'=>'required|email|unique:user'
        ]);
        DB::table('user')->insert([
            'USERNAME'=>$request->username,
            'PASSWORD'=>Crypt::encryptString($request->password),
            'EMAIL'=>$request->email,
            'ROLE'=>2
        ]);

        return redirect('/login')->with(
            'alert', 'Selamat! Akun Anda berhasil dibuat.');
    }


    // public function delete($id){
    //     Userdariadmin::destroy($id);
    //     return redirect('/admin/user/user')->with(
    //         'alert_danger', 'Data Berhasil Dihapus.');
    // }
}
