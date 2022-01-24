<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class scanController extends Controller
{
    //
    public function index(){
        // $admin = Admin::all();
        // return view ('/admin/tabelcustomer', compact('admin'));
        return view ('/admin/scan');
    }
}

