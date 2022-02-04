<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;

class PembayaranController extends Controller
{
    //
    public function pembayaran(){ 
        $pembayaran = DB::table('pembayaran_investasi')->get();
        $proposal = DB::table('proposal_investasi')->get();
        return view ('/admin/transaksi/pembayaran')->with(compact('pembayaran','proposal'));        
    }

    public function approvePembayaran($id){
        DB::table('pembayaran_investasi')->where('ID_PEMBAYARAN', $id)->update([
            'STATUSPEMBAYARAN' => 2
        ]);
        return back();
    }

    public function tolakPembayaran($id){
        DB::table('pembayaran_investasi')->where('ID_PEMBAYARAN', $id)->update([
            'ALASAN' => $request->keterangan,
            'STATUSPEMBAYARAN' => 1
        ]);
        return back();
    }
    
    public function pengembalian(){
        $pengembalian = DB::table('pengembalian_dana')->get();
        $proposal = DB::table('proposal_investasi')->get();
        return view ('/admin/transaksi/pengembalian')->with(compact('pengembalian','proposal'));
    }

    public function approvePengembalian(Request $request, $id){
        DB::table('pengembalian_dana')->where('ID_PENGEMBALIAN', $id)->update([
            'STATUS' => 2
        ]);
        return back();
    }

    public function tolakPengembalian(Request $request, $id){
        DB::table('pengembalian_dana')->where('ID_PENGEMBALIAN', $id)->update([
            'ALASAN' => $request->keterangan,
            'STATUS' => 1
        ]);
        // DD();
        return back();
    }
}
