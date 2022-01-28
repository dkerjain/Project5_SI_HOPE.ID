<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use Illuminate\Support\Facades\Crypt;
use DB;

class AdminController extends Controller
{
    //
    public function index(){
        $user = DB::table('user')->where('ROLE',1)->get();
        return view ('/admin/admin', ['user'=>$user]);
    }

    public function store(Request $request){
        $request->validate([
            'NAME'=>'required',
            'USERNAME'=>'required|unique:user',
            'PASSWORD'=>'required',
            'EMAIL'=>'required|email|unique:user',
        ]);
        $password = Crypt::encryptString($request->PASSWORD);
        DB::table('user')->insert([
            'NAMA' => $request->NAME,
            'USERNAME' => $request->USERNAME,
            'PASSWORD' => $password,
            'EMAIL' => $request->EMAIL,
            'ROLE' => 1
        ]);
        return redirect('/admin/admin')->with(
            'alert', 'Data Berhasil Disimpan.');
    }

    public function delete($id){
        DB::table('user')->where('ID_USER', $id)->delete();
        return redirect('/admin/admin')->with(
            'alert_danger', 'Data Berhasil Dihapus.');
    }
}
