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

class AturProfilController extends Controller
{
    //
    public function index_daftarcustomer(Request $request)
    {
        $customer = Customer::where('id', Auth::user()->id)->first();
        $sumberdana = Sumberdana::all();
        $penghasilan = Penghasilan::all();
        $pekerjaan = Pekerjaan::all();
        return view('user/customer/daftarcustomer', compact('customer', 'sumberdana', 'penghasilan', 'pekerjaan'));
    }

    public function store_daftarcustomer(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
            'nama_ibukandung' => 'required',
            'alamat' => 'required',
            // 'kota'=>'required',
            'nomorhp' => 'required',
            'pekerjaan' => 'required',
            'sumberdana' => 'required',
            'penghasilan' => 'required',
        ]);
        // dd($request);
        User::where('id', Auth::user()->id)->update([
            'id_customer' => Auth::user()->id
        ]);

        Customer::where('id', Auth::user()->id)->update([
            'nama_customer' => $request->nama_customer,
            'nama_ibukandung' => $request->nama_ibukandung,
            'alamat' => $request->alamat,
            // 'kota'=>$request->kota,
            'nomorhp' => $request->nomorhp,
            'pekerjaan' => $request->pekerjaan,
            'sumberdana' => $request->sumberdana,
            'penghasilan' => $request->penghasilan
        ]);
        return redirect('/daftarcustomer')->with(
            'alert',
            'Data Berhasil Disimpan.'
        );
    }

    public function index_daftarcustomer2(Request $request)
    {
        $customer = Customer::where('id', Auth::user()->id)->first();
        // dd($customer);
        return view('user/customer/dokumencustomer', compact('customer'));
    }

    public function store_daftarcustomer2(Request $request)
    {
        $request->validate([
            'fotoktp' => 'required',
            'fotonpwp' => 'required',
            'selfiektp' => 'required',
        ]);

        if (($request->has('fotoktp')) && ($request->has('fotonpwp')) && ($request->has('selfiektp'))) {
            $file1 = $request->file('fotoktp');
            $namaktp = 'fotoktp_' . Auth::user()->id . '.' . $file1->getClientOriginalExtension();
            $file1->move('images/fotoktp', $namaktp);

            $file2 = $request->file('selfiektp');
            $selfiektp = 'selfiektp_' . Auth::user()->id . '.' . $file1->getClientOriginalExtension();
            $file2->move('images/selfiektp', $selfiektp);

            $file3 = $request->file('fotonpwp');
            $fotonpwp = 'fotonpwp_' . Auth::user()->id . '.' . $file1->getClientOriginalExtension();
            $file3->move('images/fotonpwp', $fotonpwp);

            Customer::where('id', Auth::user()->id)->update([
                'fotoktp' => $namaktp,
                'selfiektp' => $selfiektp,
                'fotonpwp' => $fotonpwp,
            ]);
        }
        return redirect('/lengkapidokumen')->with(
            'alert',
            'Data berhasil disimpan.'
        );
    }

    public function index_daftarcustomer3(Request $request)
    {
        $customer = Customer::where('id', Auth::user()->id)->first();
        $bank = Bank::all();
        return view('user/customer/rekeningcustomer', compact('customer', 'bank'));
    }

    public function store_daftarcustomer3(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'nomorrekening' => 'required',
        ]);

        Customer::where('id', Auth::user()->id)->update([
            'bank' => $request->bank,
            'nomorrekening' => $request->nomorrekening,
        ]);
        return redirect('/inforekeningcustomer')->with(
            'alert',
            'Data Berhasil Disimpan.'
        );
    }

    public function index_daftarpetani()
    {
        $petani = UserPetani::where('id', Auth::user()->id_petani)->first();
        // $customer=Customer::where('id',Auth::user()->id)->first();
	    $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('user/petani/daftarpetani', compact('petani','provinsi'));
    }

    public function store_petani(Request $request)
    {
        // dd($request->all());

        $petani = UserPetani::create([
            'nama_pj' => $request->nama_petani,
            'EMAIL' => Auth::user()->email,
            'id_customer' => Auth::user()->id_customer,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            // 'kota'=>$request->kota,
            // 'longitude'=>$request->longitude,
            // 'latitude'=>$request->laatitude,
            // 'accuracy'=>$request->nama_perusahaan,
        ]);
        // dd($petani->all());
        // $petani = new Petani;
        //     $petani->EMAIL = $request->email;
        //     $petani->EMAIL = $request->email;
        //     $petani->EMAIL = $request->email;
        //     $petani->save();

        User::where('id', Auth::user()->id)->update([
            'ROLE' => 'mix'
        ]);
        User::where('id', Auth::user()->id)->update([
            'id_petani' => $petani->id
        ]);
        return redirect('/dashboard_petani');
    }
}
