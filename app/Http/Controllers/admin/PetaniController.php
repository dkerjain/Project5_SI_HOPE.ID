<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetaniController extends Controller
{
    //
    public function index(){
        // $admin = Admin::all();
        // return view ('/admin/tabelcustomer', compact('admin'));
	    $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view ('/admin/petani/petani',compact('provinsi'));
    }

    public function getStates($id) 
    {
        $kota = DB::table('kota')->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA","ID_KOTA");
        return json_encode($kota);
    }

    public function kecamatan($id) 
    {
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA",$id)->pluck("NAMA_KECAMATAN","ID_KECAMATAN");
        return json_encode($kecamatan);
    }
    public function kelurahan($id) 
    {
        $kelurahan = DB::table('kelurahan')->where('ID_KECAMATAN', $id)->get();
        return json_encode($kelurahan);
    }

}
