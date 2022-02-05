<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;
use Session;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $proposal_investasi = DB::table('proposal_investasi')->where('STATUS_PROPOSAL','2')->get();
        $pembayaran_investasi = DB::table('pembayaran_investasi')->where('STATUSPEMBAYARAN','2')->get();
        return view('user.dashboard',['proposal_investasi'=>$proposal_investasi,'pembayaran_investasi'=>$pembayaran_investasi]);
    }
    public function index_petani()
    {
        return view('user.dashboard_petani');
    }
}
