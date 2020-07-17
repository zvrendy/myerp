<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\City as Kota;
use Illuminate\Support\Str;
use File;
use App\Cabang;
use App\Jabatan;
use App\Departemen;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexKaryawan = Karyawan::with('jabatan','cabang','departemen')->orderBy('karyawan_nik', 'asc')->paginate(30);
        $idkota = Kota::orderBy('id', 'asc')->get();
        $idcabang = Cabang::orderBy('cabang_id', 'asc')->get();
        $idjabatan = Jabatan::orderBy('jabatan_id', 'asc')->get();
        $iddepartemen = Departemen::orderBy('departemen_id')->get();
        
        return view('content.karyawan.index', compact('indexKaryawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idkota = Kota::orderBy('id', 'asc')->get();
        $idcabang = Cabang::orderBy('cabang_id', 'asc')->get();
        $idjabatan = Jabatan::orderBy('jabatan_id', 'asc')->get();
        $iddepartemen = Departemen::orderBy('departemen_id')->get();

        return view('content.karyawan.add', compact( 'idkota', 'idcabang', 'idjabatan', 'iddepartemen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Kolom :attribute harap di isi!',
            'unique' => 'Kolom :attribute merupakan duplikasi',
        ];

       $validator = Validator::make($request->all(), [
            'karyawan_nik' => 'required|unique:karyawan,karyawan_nik',
            'karyawan_email' => 'required|unique:karyawan,karyawan_email',
            'karyawan_nama' => 'required',
            'karyawan_nickname' => 'required',
            'karyawan_ktp' => 'required|unique:karyawan,karyawan_ktp',
            'karyawan_foto' => 'required|image|mimes:png,jpeg,jpg'
            
       ], $message);
      
        if ($validator->fails()) {
            $pesan = $validator->messages();
            return Redirect::to(route('karyawan.create'))
            ->withErrors($validator);
        } else {
            if ($request->hasFile('karyawan_foto')) {
                

                $img = $request->file('karyawan_foto');
                $filename = Str::slug($request->karyawan_nik) . '_' . Str::slug($request->karyawan_nickname) . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/karyawan', $filename);
                try {
                    
                    $karyawan = new Karyawan($request->all());
                    
                    $karyawan->karyawan_nik = $request->input('karyawan_nik');
                    $karyawan->karyawan_foto = $filename;
                    $karyawan->save();
                    
                    return redirect(route('karyawan.index'))->with(['success' => 'Karyawan: ' . $karyawan->karyawan_nama . ' Ditambahkan']);
                    
                } catch (\Exception $e) {
                    // return response()->json(['error'=>$validator->errors()->all()]);
                    return redirect()->back()->with(['error' => $e->getMessage()]);
                }
            }
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($karyawan_nik)
    {
       
        $karyawan = Karyawan::with('jabatan','cabang','departemen')->where('karyawan_nik', $karyawan_nik)->first();
        
        return view('content.karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($karyawan_nik)
    {
        $karyawan = Karyawan::find($karyawan_nik);
        $idkota = Kota::orderBy('id', 'asc')->get();
        $idcabang = Cabang::orderBy('cabang_id', 'asc')->get();
        $idjabatan = Jabatan::orderBy('jabatan_id', 'asc')->get();
        $iddepartemen = Departemen::orderBy('departemen_id')->get();
        
        return view('content.karyawan.edit', compact('karyawan', 'idkota', 'idcabang', 'idjabatan', 'iddepartemen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan_nik)
    {
         $message = [
            'required' => 'Kolom :attribute harap di isi!',
        ];

        $validator = Validator::make($request->input(), array(
            'karyawan_nik' => 'required',
            'karyawan_nama' => 'required',
            'karyawan_nickname' => 'required',
            'karyawan_ktp' => 'required',

        ), $message);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors(),
            ], 422);
        }
		
		$karyawan = Karyawan::find($karyawan_nik);

        $karyawan->karyawan_nik = $request->input('karyawan_nik');
		$karyawan->karyawan_nama = $request->input('karyawan_nama');
        $karyawan->save();

        return response()->json([
            'error' => false,
            'karyawan' => $karyawan,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($karyawan_nik)
    {
        $karyawan = Karyawan::where('karyawan_nik', '=', $karyawan_nik)->firstOrFail();
        $karyawan->delete();

        return redirect(route('karyawan.index'))->with(['success' => 'Data Karyawan [' . $karyawan->karyawan_nik . '] - ' . $karyawan->karyawan_nama . ' Sudah Dihapus']);
    }
}
