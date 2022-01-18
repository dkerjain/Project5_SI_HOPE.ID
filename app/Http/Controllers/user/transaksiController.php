<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    //
    public function applyProposal(){
        return view ('/user/petani/applyProposal');
    }

    public function applyInvestasi(){
        return view ('/user/customer/applyInvestasi');
    }

    public function pembayaran(){
        return view ('/user/customer/pembayaran');
    }
}
