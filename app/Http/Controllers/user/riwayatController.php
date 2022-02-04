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
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }
        $riwayat = DB::table('proposal_investasi')->where('ID_PETANI',$petani_id)->get();
        return view ('/user/petani/riwayatPengajuan', ['riwayat'=>$riwayat]);
    }
    
    public function riwayatInvestor(){
        $id=Session::get('id');
        $dok_cust = DB::table('dokumen_customer')->get();
        $cust = DB::table('customer')->get();
        $cust_id=null;
        foreach($cust as $c){
            if($c->ID_USER == $id){
                $cust_id=$c->ID_CUSTOMER;
            }
        }
        $riwayat_invest = DB::table('proposal_investasi')->get();
        $riwayat = DB::table('pembayaran_investasi')->where('ID_CUSTOMER',$cust_id)->get();
        $pengembalian = DB::table('pengembalian_dana')->get();
        return view ('/user/customer/riwayatInvestasi', ['riwayat'=>$riwayat, 'riwayat_invest'=>$riwayat_invest, 'pengembalian'=>$pengembalian]);
    }
}
