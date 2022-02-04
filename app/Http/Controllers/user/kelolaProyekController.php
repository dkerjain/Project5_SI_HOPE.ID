<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class kelolaProyekController extends Controller
{
    //
    public function index(){
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }
        $proposal = DB::table('proposal_investasi')->where('STATUS_PROPOSAL','2')->where('ID_PETANI',$petani_id)->get();
        $pembayaran_investasi = DB::table('pembayaran_investasi')->where('STATUSPEMBAYARAN','2')->get();
        $pengembalian = DB::table('pengembalian_dana')->get();
        return view ('/user/petani/kelolaProyek',['proposal'=>$proposal,'pembayaran_investasi'=>$pembayaran_investasi, 'pengembalian'=>$pengembalian]);
    }

    public function pengembalian(Request $request){
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }

        $id=(DB::table('pengembalian_dana')->MAX('ID_PENGEMBALIAN'))+1;

        if (($request->has('bukti'))) {
            $file1 = $request->file('bukti');
            $namafoto = 'buktipengembalian_' . $id . '_' . $request->file('bukti')->getClientOriginalName();
            $file1->move('images/buktipembayaran', $namafoto);
            $filefoto = 'images/buktipembayaran/'.$namafoto;
        }
        DB::table('pengembalian_dana')->insert([
            'ID_PENGEMBALIAN' => $id,
            'ID_PETANI' => $petani_id,
            'ID_INVESTASI' => $request->id,
            'TOTAL_BAYAR' => $request->total,
            'BUKTI' => $filefoto,
            'PRESENTASE_KEUNTUNGAN' => $request->profit,
            'STATUS' => '0'
        ]);
        return redirect('/kelolaProyek');
    }
}
