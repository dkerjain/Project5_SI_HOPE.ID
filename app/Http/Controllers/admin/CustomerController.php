<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\Customer;
use App\Models\user\Penghasilan;
use App\Models\user\Sumberdana;
use App\Models\user\pekerjaan;
use Auth;
use Response;
use Storage;

use DB;

class CustomerController extends Controller
{
    //
    public function index(){
        $customer = DB::table('customer')->get();
        $kota = DB::table('kota')->get();
        $bank = DB::table('bank')->get();
        $user = DB::table('user')->get();
        $dokumen_customer = DB::table('dokumen_customer')->get();
        return view ('admin/customer/customer',compact('customer','kota','bank','user','dokumen_customer'));
    }

    public function store_aktif(Request $request){

        Customer::where('id',$request->id)->update([
            'status'=>'Aktif'
        ]);
        return redirect('/admin/customer')->with(
            'alert', 'Status customer telah diperbarui.');
    }

    public function store_nonaktif(Request $request){

        Customer::where('id',$request->id)->update([
            'status'=>'Nonaktif'
        ]);
        return redirect('/admin/customer')->with(
            'alert', 'Status customer telah diperbarui.');
    }

    public function getpreviewktp($id)
    {
        $file = Customer::where('id', $id)->first();
        $filektp = $file->fotoktp;
        $ext = explode('.', $file->fotoktp);

        return Response::make(Storage::disk('public')->get('/images/fotoktp/' . $filektp), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="' . $filektp . '"',
        ]);
    }

    public function getpreviewselfiektp($id)
    {
        $file = Customer::where('id', $id)->first();
        $fileselfie = $file->selfiektp;
        $ext = explode('.', $file->selfiektp);

        return Response::make(Storage::disk('public')->get('/images/selfiektp/' . $fileselfie), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="' . $fileselfie . '"',
        ]);
    }
    
    public function getpreviewnpwp($id)
    {
        $file = Customer::where('id', $id)->first();
        $filenpwp = $file->fotonpwp;
        $ext = explode('.', $file->fotonpwp);

        return Response::make(Storage::disk('public')->get('/images/fotonpwp/' . $filenpwp), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="' . $filenpwp . '"',
        ]);
    }
}
