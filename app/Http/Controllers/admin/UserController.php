<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;

class UserController extends Controller
{
    //
    public function index(){
        $user = DB::table('user')->get();
        return view ('/admin/user/user', ['user'=>$user]);
    }
    public function delete($id){
        DB::table('user')->where('ID_USER', $id)->delete();
        return redirect('/admin/user')->with(
            'alert_danger', 'Data Berhasil Dihapus.');
    }
}
