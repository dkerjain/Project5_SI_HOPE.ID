<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('user.dashboard');
    }
    public function index_petani()
    {
        return view('user.dashboard_petani');
    }
}
