<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class riwayatController extends Controller
{
    //
    public function riwayatPetani(){
        return view ('/user/petani/riwayatPengajuan');
    }
    
    public function riwayatInvestor(){
        return view ('/user/customer/riwayatInvestasi');
    }
}
