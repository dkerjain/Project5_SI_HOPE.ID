<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;

class dokumenPetaniController extends Controller
{
    //
    public function index(){
        if(Session::get('login')){
            $id=Session::get('id');
            $dok_petani = DB::table('dokumen_petani')->get();
            $petani = DB::table('petani')->get();
            $petani_id=null;
            foreach($petani as $p){
                if($p->ID_USER == $id){
                    $petani_id=$p->ID_PETANI;
                }
            }
            foreach($dok_petani as $d){
                if($petani_id == $d->ID_PETANI){
                    return redirect('/dokumenpetaniupdate');
                    break;
                }
            }
            return view ('/user/petani/dokumenPetani');
        }else{
            return redirect('/login');
        }
        
    }

    public function dokumenpetani()
    {
        if(Session::get('login')){
            $id=Session::get('id');
            $petani = DB::table('petani')->get();
            $petani_id=null;
            foreach($petani as $p){
                if($p->ID_USER == $id){
                    $petani_id=$p->ID_PETANI;
                }
            }
            $dok_petani = DB::table('dokumen_petani')->where('ID_PETANI',$petani_id)->get();
            return view('user/petani/updatedokumenPetani', ['dok_petani'=>$dok_petani]);
        }else{
            return redirect('/login');
        }
    }

    public function store_dokumenpetani(Request $request)
    {
        if (($request->has('dokperusahaan')) && ($request->has('laporan'))) {
            $user_id=Session::get('id');
            $petani = DB::table('petani')->get();
            $petani_id=null;
            foreach($petani as $p){
                if($p->ID_USER == $user_id){
                    $petani_id=$p->ID_PETANI;
                }
            }
            $file1 = $request->file('dokperusahaan');
            $namadok = 'dokperusahaan_' . $petani_id . '_' . $file1->getClientOriginalName();
            $file1->move('dokumenpetani/dokperusahaan', $namadok);
            $filedok = 'dokumenpetani/dokperusahaan/'.$namadok;
            
            $file2 = $request->file('laporan');
            $laporan = 'laporan_' . $petani_id . '_' . $file2->getClientOriginalName();
            $file2->move('dokumenpetani/laporan', $laporan);
            $filelaporan = 'dokumenpetani/laporan/'.$laporan;

            $id=(DB::table('dokumen_petani')->MAX('ID_DOKUMEN_PETANI'))+1;
            DB::table('dokumen_petani')->insert([
                'ID_DOKUMEN_PETANI'=>$id,
                'ID_PETANI' => $petani_id, 
                'BUKTIPERUSAHAAN' => $filedok,
                'LAPORANKEUANGAN' => $filelaporan,
                'STATUS_DOK' => '0'
            ]);
        }
        return redirect('/dokumenpetaniupdate')->with(
            'alert',
            'Data berhasil disimpan.'
        );
    }

    public function updatedokumenpetani(Request $request)
    {
        
        if ($request->has('dokperusahaan')) {
            $user_id=Session::get('id');
            $petani = DB::table('petani')->get();
            $petani_id=null;
            foreach($petani as $p){
                if($p->ID_USER == $user_id){
                    $petani_id=$p->ID_PETANI;
                }
            }
            $file1 = $request->file('dokperusahaan');
            $namadok = 'dokperusahaan_' . $petani_id . '_' . $file1->getClientOriginalName();
            $file1->move('dokumenpetani/dokperusahaan', $namadok);
            $filedok = 'dokumenpetani/dokperusahaan/'.$namadok;

            DB::table('dokumen_petani')->where('ID_DOKUMEN_PETANI',$request->ID_DOKUMEN_CUSTOMER)->update([
                'BUKTIPERUSAHAAN' => $filedok
            ]);
        }

        if ($request->has('laporan')) {
            $user_id=Session::get('id');
            $petani = DB::table('petani')->get();
            $petani_id=null;
            foreach($petani as $p){
                if($p->ID_USER == $user_id){
                    $petani_id=$p->ID_PETANI;
                }
            }
            
            $file2 = $request->file('laporan');
            $laporan = 'laporan_' . $petani_id . '_' . $file2->getClientOriginalName();
            $file2->move('dokumenpetani/laporan', $laporan);
            $filelaporan = 'dokumenpetani/laporan/'.$laporan;

            DB::table('dokumen_petani')->where('ID_DOKUMEN_PETANI',$request->ID_DOKUMEN_CUSTOMER)->update([
                'LAPORANKEUANGAN' => $filelaporan
            ]);
        }

        return redirect('/dokumenpetaniupdate')->with(
            'alert',
            'Data berhasil disimpan.'
        );
    }

    public function index_rekening()
    {
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }
        $petani=DB::table('petani')->where('ID_PETANI',$petani_id)->get();
        $bank = DB::table('bank')->get();
        return view('user/petani/rekeningpetani', ['bank'=>$bank,'petani'=>$petani]);
    }

    public function store_rekeningbaru(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'nomorrekening' => 'required',
        ]);
        $user_id=Session::get('id');
        $petanidata = DB::table('petani')->get();
        $petani_id=null;
        foreach($petanidata as $p){
            if($p->ID_USER == $user_id){
                $petani_id=$p->ID_PETANI;
            }
        }
        DB::table('petani')->where('ID_PETANI',$petani_id)->update([
            'ID_BANK' => $request->bank,
            'NOMORREKENING' => $request->nomorrekening,
        ]);
        return redirect('/inforekeningpetani')->with(
            'alert',
            'Data Berhasil Disimpan.'
        );
    }
}
