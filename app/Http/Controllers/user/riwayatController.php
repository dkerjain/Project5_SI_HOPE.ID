<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class riwayatController extends Controller
{
    //
    public function riwayatPetani(){
        $riwayat = DB::table('proposal_investasi')->get();
        return view ('/user/petani/riwayatPengajuan', ['riwayat'=>$riwayat]);
    }
    
    public function riwayatInvestor(){
        $riwayat_invest = DB::table('proposal_investasi')->get();
        $riwayat = DB::table('pembayaran_investasi')->get();
        return view ('/user/customer/riwayatInvestasi', ['riwayat'=>$riwayat, 'riwayat_invest'=>$riwayat_invest]);
    }
}
