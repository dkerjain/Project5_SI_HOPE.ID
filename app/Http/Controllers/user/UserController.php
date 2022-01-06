<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\Customer;


class UserController extends Controller
{
    //
    public function index(){
        $user=User::all();
        return view ('/user/register', compact('user'));
    }

    public function store(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
            'email'=>'required|email|unique:user',
            'ROLE'=>'required',
        ]);

        $customer = new Customer;
        $customer->email = $request->email;
        $customer->save();

        User::create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'ROLE'=>$request->ROLE
        ]);

        return redirect('/login')->with(
            'alert', 'Selamat!Akun Anda berhasil dibuat.');
    }


    // public function delete($id){
    //     Userdariadmin::destroy($id);
    //     return redirect('/admin/user/user')->with(
    //         'alert_danger', 'Data Berhasil Dihapus.');
    // }
}
