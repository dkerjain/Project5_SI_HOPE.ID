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
        return view ('/admin/transaksi/pembayaran')->with(compact('pembayaran'));        
    }

    public function approvePembayaran($id){
        DB::table('pembayaran_investasi')->where('ID_PEMBAYARAN', $id)->update([
            'STATUSPEMBAYARAN' => 2
        ]);
        return back();
    }

    public function tolakPembayaran($id){
        DB::table('pembayaran_investasi')->where('ID_PEMBAYARAN', $id)->update([
            'KETERANGAN_PEMBAYARAN' => $request->keterangan,
            'STATUSPEMBAYARAN' => 1
        ]);
        return back();
    }
    
    public function pengembalian(){
        $pengembalian = DB::table('pengembalian_dana')
                        ->join('pembayaran_investasi', 'pembayaran_investasi.ID_PEMBAYARAN','=','pengembalian_dana.ID_PEMBAYARAN')
                        ->get();
        return view ('/admin/transaksi/pengembalian')->with(compact('pengembalian'));
    }

    public function approvePengembalian(Request $request, $id){
        DB::table('pengembalian_dana')->where('ID_PENGEMBALIAN', $id)->update([
            'STATUS_PENGEMBALIAN' => 2
        ]);
        return back();
    }

    public function tolakPengembalian(Request $request, $id){
        DB::table('pengembalian_dana')->where('ID_PENGEMBALIAN', $id)->update([
            'KETERANGAN_PENGEMBALIAN' => $request->keterangan,
            'STATUS_PENGEMBALIAN' => 1
        ]);
        // DD();
        return back();
    }
}
