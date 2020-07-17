<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
=======
use App\Company as Company;
use App\CompanyProject as CompanyProject;
use Illuminate\Support\Facades\DB;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0

class LoginController extends Controller
{
    public function index()
    {
<<<<<<< HEAD

=======
        
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        return view('login');
    }

    public function check_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
<<<<<<< HEAD

        if (Auth::guard('web')->attempt(['username' => $username, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
=======
        
        if(Auth::guard('web')->attempt(['username' => $username, 'password' => $password])){
            return response()->json([
                'success' => true
            ], 200);
           
            
        } else {
            return response()-> json([
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
                'success' => false,
                'message' => 'Login Gagal!'
            ], 400);
        }
    }

    public function get_company()
    {
<<<<<<< HEAD
        $company = DB::table('mst_perusahaan')->get();
        // $company = DB::table('company')->pluck('company_nama', 'kode_usaha')->prepend('pilih', '');
        $html = '';
        $html .= '<option value="">Pilih</option>';
        foreach ($company as $cmp) {
            $html .= '<option value="' . $cmp->kode_usaha . '">' . $cmp->nama_usaha . '</option>';
=======
        $company = DB::table('company')->get();
        // $company = DB::table('company')->pluck('company_nama', 'company_id')->prepend('pilih', '');
        $html = '';
        $html .= '<option value="">Pilih</option>';
        foreach ($company as $cmp ) {
            $html .= '<option value="'.$cmp->company_id.'">'.$cmp->company_nama.'</option>';
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        }

        return response()->json(['html' => $html]);
    }

    public function fetch(Request $request)
    {
<<<<<<< HEAD
        if (!$request->kode_usaha) {
=======
        if (!$request->company_id) {
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
            $html = '<option value="">Pilih</option>';
        } else {
            $html = '';
            $html .= '<option value="">Pilih</option>';
<<<<<<< HEAD
            $cproject = DB::table('mst_cabang')->where('kode_usaha', $request->kode_usaha)->get();
            foreach ($cproject as $cmp) {
                $html .= '<option value="' . $cmp->kode_cabang . '">' . $cmp->nama_usaha . '</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function final(Request $request)
    {

        // $log = DB::table('user')->where('username', $request->username)->get();
        if ($request) {
            // session()->put('nama', $log->username);
            session()->put('perusahaan', $request->company);
            session()->put('cabang', $request->companyproject);
            Session::save();
            // dd(Session::get('perusahaan'));
            return redirect()->route('dashboard.index');
        }
    }
=======
            $cproject = CompanyProject::where('company_id', $request->company_id)->get();
            foreach ($cproject as $cmp) {
                $html .= '<option value="'.$cmp->company_project_id.'">'.$cmp->company_project_nama.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
}
