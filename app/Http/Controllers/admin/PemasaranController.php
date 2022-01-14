<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PemasaranController extends Controller
{
    //
    public function index(){
        return view ('/admin/pemasaran/pengajuan');
    }
}
