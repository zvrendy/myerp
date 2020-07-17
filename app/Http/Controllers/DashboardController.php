<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Menu;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('content.dashboard');
    }

    public function change(Request $request)

    {
        if ($request) {
            // session()->put('nama', $log->username);
            session()->put('perusahaan', $request->company);
            session()->put('cabang', $request->companyproject);
            Session::save();
            //     // dd(Session::get('perusahaan'));
            return redirect()->route('dashboard.index');
        }
    }
}
