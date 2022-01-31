<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;

class transaksiController extends Controller
{
    //
    public function applyProposal(){
        return view ('/user/petani/applyProposal');
    }

    public function store_applyProposal(Request $request){
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }
        $id=(DB::table('proposal_investasi')->MAX('ID_INVESTASI'))+1;

        // if (($request->has('inputFoto'))) {
        //     $file1 = $request->file('inputFoto');
        //     $namafoto = 'fotoproyek_' . $id . '_' . $request->file('inputFoto')->getClientOriginalName();
        //     $file1->move('images/fotoproyek', $namafoto);
        //     $filefoto = 'images/fotoproyek/'.$namafoto;
        // }
        DB::table('proposal_investasi')->insert([
            'ID_INVESTASI' => $id,
            'ID_PETANI' => $petani_id,
            'NAMA_PROYEK' => $request->namaProyek,
            'JUMLAHKEBUTUHAN' => $request->jumlahKebutuhan,
            'PERIODEKONTRAK' => $request->periode,
            'PERSENTASEPROFIT' => $request->profit,
            'JENISINVESTASI' => $request->jenis,
            'DETAIL' => $request->detail,
            'STATUS_PROPOSAL' => '0',
        //    'PATH' => $filefoto
        ]);
        return redirect('/applyProposal')->with(
            'alert',
            'Data berhasil disimpan. Untuk melihat status proposal silahkan ke halaman Riwayat Pengajuan.'
        );
    }

    public function applyInvestasi(){
        return view ('/user/customer/applyInvestasi');
    }

    public function pembayaran(){
        return view ('/user/customer/pembayaran');
    }

    public function konfirmasi(){
        return view ('/user/customer/konfirmasiPembayaran');
    }
}
