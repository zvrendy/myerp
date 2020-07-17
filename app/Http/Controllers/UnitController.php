<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Menu;
use Redirect, Response;
use DataTables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getUnit = Unit::orderBy('id_unit', 'asc')->paginate(10);

        return view('content.unit.index', compact('getUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = unit::updateOrCreate(
            ['id_unit' => $request->id_unit, 'kd_unit' => $request->kd_unit],
            [
                'id_unit' => $request->id_unit,
                'kd_unit' => $request->kd_unit,
                'keterangan' => $request->keterangan,
                'hpp' => $request->hpp,
                'harga_jual' => $request->harga_jual,
                'gambar' => Str::slug($request->kd_unit) . '_' . Str::Slug($request->keterangan),
                'flag_status' => $request->flag_status,
                'user_stamp' => 'ok',
                'kode_cabang' => $request->kode_cabang
            ]
        );

        return Response::json($unit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id_unit' => $id);
        $unit = unit::where($where)->first();
        return Response::json($unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = unit::where('id_unit', $id)->delete();

        return Response::json($unit);
    }
}
