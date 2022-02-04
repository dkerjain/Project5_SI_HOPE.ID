<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class scanController extends Controller
{
    //
    public function index(){
        $petani = DB::table('petani')
                ->join('dokumen_petani', 'petani.ID_PETANI', '=', 'dokumen_petani.ID_PETANI')
                ->get();
        return view ('/admin/scan',['petani'=>$petani]);
    }

    public function verifikasi($id){
        $petani = DB::table('petani')->where("ID_PETANI",$id)->update([
            'STATUS' => '1'
        ]);
        
        $dokumen_petani = DB::table('dokumen_petani')->where("ID_PETANI",$id)->update([
            'STATUS_DOK' => '1'
        ]);
        return redirect('/admin/petani');
    }
}

