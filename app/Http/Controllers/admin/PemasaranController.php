<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;

class PemasaranController extends Controller
{
    //
    public function index(){
        $proposal = DB::table('proposal_investasi')->get();
        return view ('/admin/pemasaran/pengajuan')->with(compact('proposal'));
        
    }

    public function approvePengajuan(Request $request, $id){
        DB::table('proposal_investasi')->where('ID_INVESTASI', $id)->update([
            'STATUS_PROPOSAL' => 2
        ]);
        return back();
    }

    public function tolakPengajuan(Request $request, $id){
        DB::table('proposal_investasi')->where('ID_INVESTASI', $id)->update([
            'ALASAN' => $request->keterangan,
            'STATUS_PROPOSAL' => 1
        ]);
        // DD();
        return back();
    }
}
