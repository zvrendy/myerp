<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Redirect, Response;
use DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getSupplier = Supplier::where('kode_cabang', session()->get('cabang'))->orderBy('id_supp', 'asc')->paginate(10);
        return view('content.supplier.index', compact('getSupplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.supplier.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::updateOrCreate(
            ['id_supp' => $request->id_supp],
            [
                'id_supp' => $request->id_supp,
                'ktp' => $request->ktp,
                'npwp' => $request->npwp,
                'nama' => $request->nama,
                'tipe' => $request->tipe,
                'alamat' => $request->alamat,
                'kontak_person' => $request->kontak_person,
                'telp' => $request->telp,
                'fax' => $request->fax,
                'kode_cabang' => $request->kode_cabang
            ]
        );

        return Response::json($supplier);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        // dd($supplier);

        return view('content.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('id_supp', $id)->delete();

        return redirect()->back();
    }
}
