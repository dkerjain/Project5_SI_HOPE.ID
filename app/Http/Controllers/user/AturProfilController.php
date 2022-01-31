<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\user\Customer;
use App\Models\user\Penghasilan;
use App\Models\user\Sumberdana;
use App\Models\user\pekerjaan;
use App\Models\user\Bank;
use App\Models\User;
use App\Models\Petani;
use App\Models\user\Petani as UserPetani;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class AturProfilController extends Controller
{
    //
    public function index_daftarcustomer()
    {
        if(Session::get('login')){
            $id=Session::get('id');
            $cust=DB::table('customer')->get();
            foreach($cust as $c){
                if($id == $c->ID_USER){
                    return redirect('/profilcustomer');
                    break;
                }
            }
            $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
            return view('user/customer/daftarcustomer', ['provinsi'=>$provinsi]);
        }else{
            return redirect('/login');
        }
    }

    public function index_profilcustomer(Request $request)
    {
        if(Session::get('login')){
            $id=Session::get('id');
            $customer = DB::table('customer')->where('ID_USER',$id)->get();
            $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
            return view('user/customer/profilcustomer', ['customer'=>$customer, 'provinsi'=>$provinsi]);
        }else{
            return redirect('/login');
        }
    }

    public function store_daftarcustomer(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
            'nama_ibukandung' => 'required',
            'alamat' => 'required',
            'kota'=>'required',
            'nomorhp' => 'required',
            'pekerjaan' => 'required',
            'sumberdana' => 'required',
            'penghasilan' => 'required'
        ]);
        
        $user_id=Session::get('id');
        DB::table('customer')->insert([
            'ID_USER' => $user_id,
            'NAMA_CUSTOMER' => $request->nama_customer,
            'NAMA_IBUKANDUNG' => $request->nama_ibukandung,
            'ALAMAT' => $request->alamat,
            'KOTA'=>$request->kota,
            'NOMORHP' => $request->nomorhp,
            'PEKERJAAN' => $request->pekerjaan,
            'SUMBERDANA' => $request->sumberdana,
            'PENGHASILAN' => $request->penghasilan
        ]);
        DB::table('user')->where('ID_USER',$user_id)->update([
            'nama' => $request->nama_customer,
            'role' => '4'
        ]);
        return redirect('/profilcustomer')->with(
            'alert',
            'Data Berhasil Disimpan.'
        );
    }

    public function store_updatecustomer(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
            'nama_ibukandung' => 'required',
            'alamat' => 'required',
            'kota'=>'required',
            'nomorhp' => 'required',
            'pekerjaan' => 'required',
            'sumberdana' => 'required',
            'penghasilan' => 'required'
        ]);
        
        $user_id=Session::get('id');
        $customer = DB::table('customer')->where('ID_USER',$user_id)->update([
            'NAMA_CUSTOMER' => $request->nama_customer,
            'NAMA_IBUKANDUNG' => $request->nama_ibukandung,
            'ALAMAT' => $request->alamat,
            'KOTA'=>$request->kota,
            'NOMORHP' => $request->nomorhp,
            'PEKERJAAN' => $request->pekerjaan,
            'SUMBERDANA' => $request->sumberdana,
            'PENGHASILAN' => $request->penghasilan
        ]);
        return redirect('/profilcustomer')->with(
            'alert','Data Berhasil Disimpan.'
        );
    }

    public function index_daftarcustomer2(Request $request)
    {
        if(Session::get('login')){
            $id=Session::get('id');
            $dok_cust = DB::table('dokumen_customer')->get();
            $cust = DB::table('customer')->get();
            $cust_id=null;
            foreach($cust as $c){
                if($c->ID_USER == $id){
                    $cust_id=$c->ID_CUSTOMER;
                }
            }
            foreach($dok_cust as $d){
                if($cust_id == $d->ID_CUSTOMER){
                    return redirect('/dokumencustomer');
                    break;
                }
            }
            return view('user/customer/dokumencustomer');
        }else{
            return redirect('/login');
        }
    }

    public function dokumencustomer(Request $request)
    {
        if(Session::get('login')){
            $id=Session::get('id');
            $cust = DB::table('customer')->get();
            $cust_id=null;
            foreach($cust as $c){
                if($c->ID_USER == $id){
                    $cust_id=$c->ID_CUSTOMER;
                }
            }
            $dok_customer = DB::table('dokumen_customer')->where('ID_CUSTOMER',$cust_id)->get();
            return view('user/customer/updatedokumencustomer', ['dok_customer'=>$dok_customer]);
        }else{
            return redirect('/login');
        }
    }

    public function store_daftarcustomer2(Request $request)
    {
        $request->validate([
            'fotoktp' => 'required',
            'fotonpwp' => 'required',
            'selfiektp' => 'required',
        ]);

        if (($request->has('fotoktp')) && ($request->has('fotonpwp')) && ($request->has('selfiektp'))) {
            $user_id=Session::get('id');
            $cust = DB::table('customer')->get();
            $cust_id=null;
            foreach($cust as $c){
                if($c->ID_USER == $user_id){
                    $cust_id=$c->ID_CUSTOMER;
                }
            }
            $file1 = $request->file('fotoktp');
            $namaktp = 'fotoktp_' . $cust_id . '_' . $file1->getClientOriginalName();
            $file1->move('images/fotoktp', $namaktp);
            $filektp = 'images/fotoktp/'.$namaktp;
            
            $file2 = $request->file('selfiektp');
            $selfiektp = 'selfiektp_' . $cust_id . '_' . $file2->getClientOriginalName();
            $file2->move('images/selfiektp', $selfiektp);
            $fileselfiektp = 'images/fotoktp/'.$selfiektp;

            $file3 = $request->file('fotonpwp');
            $fotonpwp = 'fotonpwp_' . $cust_id . '_' . $file3->getClientOriginalName();
            $file3->move('images/fotonpwp', $fotonpwp);
            $filefotonpwp = 'images/fotoktp/'.$fotonpwp;

            $id=(DB::table('dokumen_customer')->MAX('ID_DOKUMEN_CUSTOMER'))+1;
            DB::table('dokumen_customer')->insert([
                'ID_DOKUMEN_CUSTOMER'=>$id,
                'ID_CUSTOMER' => $cust_id, 
                'fotoktp' => $filektp,
                'selfiektp' => $fileselfiektp,
                'fotonpwp' => $filefotonpwp
            ]);
        }
        return redirect('/lengkapidokumen')->with(
            'alert',
            'Data berhasil disimpan.'
        );
    }

    public function updatedokumen(Request $request)
    {
        $request->validate([
            'fotoktp' => 'required',
            'fotonpwp' => 'required',
            'selfiektp' => 'required',
        ]);

        if ($request->has('fotoktp')) {
            $user_id=Session::get('id');
            $cust = DB::table('customer')->get();
            $cust_id=null;
            foreach($cust as $c){
                if($c->ID_USER == $user_id){
                    $cust_id=$c->ID_CUSTOMER;
                }
            }
            $file1 = $request->file('fotoktp');
            $namaktp = 'fotoktp_' . $cust_id . '_' . $file1->getClientOriginalName();
            $file1->move('images/fotoktp', $namaktp);
            $filektp = 'images/fotoktp/'.$namaktp;

            DB::table('dokumen_customer')->where('ID_CUSTOMER',$cust_id)->update([
                'fotoktp' => $filektp
            ]);
        }

        if ($request->has('fotonpwp')) {
            $user_id=Session::get('id');
            $cust = DB::table('customer')->get();
            $cust_id=null;
            foreach($cust as $c){
                if($c->ID_USER == $user_id){
                    $cust_id=$c->ID_CUSTOMER;
                }
            }

            $file3 = $request->file('fotonpwp');
            $fotonpwp = 'fotonpwp_' . $cust_id . '_' . $file3->getClientOriginalName();
            $file3->move('images/fotonpwp', $fotonpwp);
            $filefotonpwp = 'images/fotoktp/'.$fotonpwp;

            DB::table('dokumen_customer')->where('ID_CUSTOMER',$cust_id)->update([
                'fotonpwp' => $filefotonpwp
            ]);
        }

        if ($request->has('selfiektp')) {
            $user_id=Session::get('id');
            $cust = DB::table('customer')->get();
            $cust_id=null;
            foreach($cust as $c){
                if($c->ID_USER == $user_id){
                    $cust_id=$c->ID_CUSTOMER;
                }
            }
            
            $file2 = $request->file('selfiektp');
            $selfiektp = 'selfiektp_' . $cust_id . '_' . $file2->getClientOriginalName();
            $file2->move('images/selfiektp', $selfiektp);
            $fileselfiektp = 'images/fotoktp/'.$selfiektp;

            DB::table('dokumen_customer')->where('ID_CUSTOMER',$cust_id)->update([
                'selfiektp' => $fileselfiektp
            ]);
        }

        return redirect('/lengkapidokumen')->with(
            'alert',
            'Data berhasil disimpan.'
        );
    }

    public function index_daftarcustomer3(Request $request)
    {
        $user_id=Session::get('id');
        $cust = DB::table('customer')->get();
        $cust_id=null;
        foreach($cust as $c){
            if($c->ID_USER == $user_id){
                $cust_id=$c->ID_CUSTOMER;
            }
        }
        $customer=DB::table('customer')->where('ID_CUSTOMER',$cust_id)->get();
        $bank = DB::table('bank')->get();
        return view('user/customer/rekeningcustomer', ['bank'=>$bank,'customer'=>$customer]);
    }

    public function store_daftarcustomer3(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'nomorrekening' => 'required',
        ]);
        $user_id=Session::get('id');
        $cust = DB::table('customer')->get();
        $cust_id=null;
        foreach($cust as $c){
            if($c->ID_USER == $user_id){
                $cust_id=$c->ID_CUSTOMER;
            }
        }
        DB::table('customer')->where('ID_CUSTOMER',$cust_id)->update([
            'ID_BANK' => $request->bank,
            'NOMORREKENING' => $request->nomorrekening,
        ]);
        return redirect('/inforekeningcustomer')->with(
            'alert',
            'Data Berhasil Disimpan.'
        );
    }

    public function index_daftarpetani()
    {
	    if(Session::get('login')){
            $id=Session::get('id');
            $petani=DB::table('petani')->get();
            foreach($petani as $p){
                if($id == $p->ID_USER){
                    return redirect('/profilpetani');
                    break;
                }
            }
            $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
            return view('user/petani/daftarpetani', ['provinsi'=>$provinsi]);
        }else{
            return redirect('/login');
        }
    }

    public function store_petani(Request $request)
    {
        DB::table('petani')->insert([
            'id_user' =>Session::get('id'),
            'nama_pj' => $request->nama_petani,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat,
            'notelp_perusahaan' =>$request->nomorhp,
            'kota'=>$request->kota,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'accuracy'=>$request->accuracy,
            'status' =>'0'
        ]);
        return redirect('/daftarpetani');
    }

    public function profilpetani(Request $request)
    {
        if(Session::get('login')){
            $id=Session::get('id');
            $petani = DB::table('petani')->where('ID_USER',$id)->get();
            $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
            return view('user/petani/profilpetani', ['petani'=>$petani, 'provinsi'=>$provinsi]);
        }else{
            return redirect('/login');
        }
    }

    public function petaniupdate(Request $request)
    {
        DB::table('petani')->where('ID_USER',Session::get('id'))->update([
            'nama_pj' => $request->nama_petani,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat,
            'notelp_perusahaan' =>$request->nomorhp,
            'kota'=>$request->kota,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'accuracy'=>$request->accuracy
        ]);
        return redirect('/daftarpetani');
    }
}
