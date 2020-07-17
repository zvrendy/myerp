<?php

namespace App\Http\Controllers;

use App\ArPesananDtl;
use Illuminate\Http\Request;
use Redirect, Response;
use DataTables;

class ArPesananDtlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            return DataTables::of(ArPesananDtl::query())

                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" data-id="' . $data->id_sp_d . '" class="edit-menu btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-id="' . $data->id_sp_d . '" class="delete-menu btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
        $arpesandtl = ArPesananDtl::updateOrCreate(
            ['id_sp_d' => $request->id_sp_d],
            [
                'kode_trans' => $request->kode_trans,
                'kd_unit' => $request->kd_unit,
                'no_dok' => $request->no_dok,
                'id_produk' => $request->id_produk,
                'qty' => $request->qty,
                'dpp' => $request->dpp,
                'ppn' => $request->ppn,
                'pph' => $request->pph,
                'total' => $request->total,
                'flag_status' => 1,
                'tgl_input' => \Carbon\Carbon::now(),
                'tgl_update' => \Carbon\Carbon::now()
            ]

        );

        return Response::json($arpesandtl);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArPesananDtl  $arPesananDtl
     * @return \Illuminate\Http\Response
     */
    public function show(ArPesananDtl $arPesananDtl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArPesananDtl  $arPesananDtl
     * @return \Illuminate\Http\Response
     */
    public function edit(ArPesananDtl $arPesananDtl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArPesananDtl  $arPesananDtl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArPesananDtl $arPesananDtl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArPesananDtl  $arPesananDtl
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArPesananDtl $arPesananDtl)
    {
        //
    }
}
