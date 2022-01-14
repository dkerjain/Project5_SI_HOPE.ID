<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PembayaranController extends Controller
{
    //
    public function pembayaran(){
        return view ('/admin/transaksi/pembayaran');
    }

    
    public function pengembalian(){
        return view ('/admin/transaksi/pengembalian');
    }
}
