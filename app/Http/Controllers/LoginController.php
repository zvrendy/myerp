<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company as Company;
use App\CompanyProject as CompanyProject;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        
        return view('login');
    }

    public function check_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        if(Auth::guard('web')->attempt(['username' => $username, 'password' => $password])){
            return response()->json([
                'success' => true
            ], 200);
           
            
        } else {
            return response()-> json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 400);
        }
    }

    public function get_company()
    {
        $company = DB::table('company')->get();
        // $company = DB::table('company')->pluck('company_nama', 'company_id')->prepend('pilih', '');
        $html = '';
        $html .= '<option value="">Pilih</option>';
        foreach ($company as $cmp ) {
            $html .= '<option value="'.$cmp->company_id.'">'.$cmp->company_nama.'</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function fetch(Request $request)
    {
        if (!$request->company_id) {
            $html = '<option value="">Pilih</option>';
        } else {
            $html = '';
            $html .= '<option value="">Pilih</option>';
            $cproject = CompanyProject::where('company_id', $request->company_id)->get();
            foreach ($cproject as $cmp) {
                $html .= '<option value="'.$cmp->company_project_id.'">'.$cmp->company_project_nama.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }
}
