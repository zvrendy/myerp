<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        if (Auth::guard('web')->attempt(['username' => $username, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 400);
        }
    }

    public function get_company()
    {
        $company = DB::table('mst_perusahaan')->get();
        // $company = DB::table('company')->pluck('company_nama', 'kode_usaha')->prepend('pilih', '');
        $html = '';
        $html .= '<option value="">Pilih</option>';
        foreach ($company as $cmp) {
            $html .= '<option value="' . $cmp->kode_usaha . '">' . $cmp->nama_usaha . '</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function fetch(Request $request)
    {
        if (!$request->kode_usaha) {
            $html = '<option value="">Pilih</option>';
        } else {
            $html = '';
            $html .= '<option value="">Pilih</option>';
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
}
