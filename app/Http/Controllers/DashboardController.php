<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Menu;
<<<<<<< HEAD
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
=======

class DashboardController extends Controller
{
      /**
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
     * Create a new controller instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
=======
 
 
     /**
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
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
=======
        // $getMenu = Menu::all();
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        
        return view('content.dashboard', compact('getMenu'));
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }
}
