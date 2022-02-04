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
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }
        $petani = DB::table('petani')->where('ID_PETANI',$petani_id)->get();
        return view ('/user/petani/applyProposal',['petani'=>$petani]);
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

        if (($request->has('inputFoto'))) {
            $file1 = $request->file('inputFoto');
            $namafoto = 'fotoproyek_' . $id . '_' . $request->file('inputFoto')->getClientOriginalName();
            $file1->move('images/fotoproyek', $namafoto);
            $filefoto = 'images/fotoproyek/'.$namafoto;
        }
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
            'PATH' => $filefoto
        ]);
        return redirect('/applyProposal')->with(
            'alert',
            'Data berhasil disimpan. Untuk melihat status proposal silahkan ke halaman Riwayat Pengajuan.'
        );
    }

    public function applyInvestasi($id){
        if(Session::get('login')){
            $proposal = DB::table('proposal_investasi')->where('ID_INVESTASI',$id)->get();
            $petani = DB::table('petani')->get();
            return view ('/user/customer/applyInvestasi',['proposal'=>$proposal,'petani'=>$petani]);
        }else{
            return redirect('/login');
        }
    }

    public function pembayaran(Request $request){
        $proposal = DB::table('proposal_investasi')->where('ID_INVESTASI',$request->id)->get();
        $petani = DB::table('petani')->get();
        $jumlah = $request->jumlah;
        return view ('/user/customer/pembayaran',['proposal'=>$proposal,'petani'=>$petani,'jumlah'=>$jumlah]);
    }

    public function konfirmasi(Request $request){
        $proposal = DB::table('proposal_investasi')->where('ID_INVESTASI',$request->id)->get();
        $petani = DB::table('petani')->get();
        $jumlah = $request->jumlah;
        $bank = $request->jawaban;
        return view ('/user/customer/konfirmasiPembayaran',['proposal'=>$proposal,'petani'=>$petani,'jumlah'=>$jumlah, 'bank'=>$bank]);
    }

    public function payment(Request $request){
        $user_id=Session::get('id');
        $customer = DB::table('customer')->get();
        $cust_id=null;
        foreach($customer as $c){
            if($c->ID_USER== $user_id){
                $cust_id=$c->ID_CUSTOMER;
            }
        }

        $id=(DB::table('pembayaran_investasi')->MAX('ID_PEMBAYARAN'))+1;

        if (($request->has('bukti'))) {
            $file1 = $request->file('bukti');
            $namafoto = 'buktibayar_' . $id . '_' . $request->file('bukti')->getClientOriginalName();
            $file1->move('images/buktipembayaran', $namafoto);
            $filefoto = 'images/buktipembayaran/'.$namafoto;
        }
        DB::table('apply_investasi')->insert([
            'ID_CUSTOMER' => $cust_id,
            'ID_INVESTASI' => $request->id,
            'TOTAL_INVESTASI' => $request->jumlah
        ]);
        DB::table('pembayaran_investasi')->insert([
            'ID_PEMBAYARAN' => $id,
            'ID_CUSTOMER' => $cust_id,
            'ID_INVESTASI' => $request->id,
            'JUMLAHPEMBAYARAN' => $request->jumlah,
            'BUKTI' => $filefoto,
            'STATUSPEMBAYARAN' => '0'
        ]);
        return redirect('/riwayatInvestasi');
    }
}
