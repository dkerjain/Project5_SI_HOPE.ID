<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::all();
        return view ('/admin/user/user',compact('user'));
    }
}