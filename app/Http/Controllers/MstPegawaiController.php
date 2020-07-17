<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SysCabang;
use App\MstJabatan;
use App\MstAgama;
use App\MstPegawai;
use App\MstDept;
use App\MstCostCenter;
use Laravolt\Indonesia\Models\City as Kota;

class MstPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mstpegawai = MstPegawai::with('agama')->with('jabatan')->orderBy('nik', 'asc')->paginate(20);

        return view('pegawai.index', compact('mstpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idkota = Kota::orderBy('id', 'asc')->get();
        $agama = MstAgama::orderBy('kd_agama', 'asc')->get();
        $jabatan = MstJabatan::orderBy('created_at', 'asc')->get();
        $cabang = SysCabang::orderBy('kd_cabang', 'asc')->get();
        $dept = MstDept::orderBy('kd_dept', 'asc')->get();
        $cc = MstCostCenter::orderBy('kd_cc', 'asc')->get();
        return view('pegawai.create', compact('idkota', 'agama', 'cabang', 'jabatan', 'dept', 'cc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi form
        $this->validate($request, [
            'nik' => 'required|string|max:6',
            'nama' => 'required|string',
            'kota_lahir' =>  'required|string',
            'tgl_lahir' =>  'required|date',
            'gender' => 'string',
            'status_kawin' =>  'string',
            'alamat' =>  'string',
            'telepon' => 'string',
            'no_ktp' => 'string',
            'npwp' => 'string',
            'foto' => 'string',
            'kd_agama' => 'exists:mst_agama,kd_agama',
            'kd_dept' => 'exists:mst_dept,kd_dept',
            'kd_cc' => 'exists:mst_cost_center,kd_cc',
            'kd_jabatan' => 'exists:mst_jabatan,kd_jabatan',
            'kd_cabang' => 'exists:sys_cabang,kd_cabang'
        ]);

        try {
            $mstp = MstPegawai::firstOrCreate([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'kota_lahir' => $request->kota_lahir,
                'tgl_lahir' =>  $request->tgl_lahir,
                'gender' => $request->gender,
                'status_kawin' =>  $request->status_kawin,
                'alamat' =>  $request->alamat,
                'telepon' => $request->telepon,
                'no_ktp' => $request->no_ktp,
                'npwp' => $request->npwp,
                'foto' => $request->foto,
                'kd_agama' => $request->kd_agama,
                'kd_dept' => $request->kd_dept,
                'kd_cc' => $request->kd_cc,
                'kd_jabatan' => $request->kd_jabatan,
                'kd_cabang' => $request->kd_cabang,
            ]);
            // var_dump($request);
            return redirect(route('pegawai.index'))->with(['success' => 'Pegawai: ' . $mstp->nama . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MstPegawai  $mstPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(MstPegawai $mstPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MstPegawai  $mstPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(MstPegawai $mstPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MstPegawai  $mstPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MstPegawai $mstPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MstPegawai  $mstPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $nik = MstPegawai::where('nik', '=', $nik)->firstOrFail();
        $nik->delete();

        return redirect(route('pegawai.index'))->with(['success' => 'Pegawai: ' . $nik->nama . 'Dihapus']);
    }
}
