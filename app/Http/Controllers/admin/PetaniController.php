<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetaniController extends Controller
{
    //
    public function index(){
        // $admin = Admin::all();
        // return view ('/admin/tabelcustomer', compact('admin'));
        return view ('/admin/petani/petani');
    }
}
