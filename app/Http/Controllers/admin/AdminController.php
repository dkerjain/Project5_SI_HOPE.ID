<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;

class AdminController extends Controller
{
    //
    public function index(){
        $admin = Admin::all();
        return view ('/admin/admin', compact('admin'));
    }

    public function store(Request $request){
        $request->validate([
            'USERNAME'=>'required',
            'PASSWORD'=>'required',
            'EMAIL'=>'required',
        ]);
        
        Admin::create([
            'USERNAME'=>$request->USERNAME,
            'PASSWORD'=>$request->PASSWORD,
            'EMAIL'=>$request->EMAIL
        ]);
        return redirect('/admin/admin')->with(
            'alert', 'Data Berhasil Disimpan.');
    }

    public function delete($id){
        Admin::destroy($id);
        return redirect('/admin/admin')->with(
            'alert_danger', 'Data Berhasil Dihapus.');
    }
}
