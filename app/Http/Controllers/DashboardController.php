<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Menu;

class DashboardController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
 
 
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $getMenu = Menu::all();
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        
        return view('content.dashboard', compact('getMenu'));
    }
}
