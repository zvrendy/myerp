<?php

namespace App\Http\Controllers;

use App\ArPesananHdr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Customer;
use App\Unit;
use App\Produk;
use App\Trans;
use Redirect, Response;
use DataTables;
use DB;

class ArPesananHdrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getARPesananHdr = ArPesananHdr::with('customer')->orderBy('id_sp_h', 'asc')->paginate(20);

        return view('content.accountreceivable.pesanan.index', compact('getARPesananHdr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::where('kode_cabang', Auth::user()->kode_cabang)->get(['id_cust', 'nama']);


        return view('content.accountreceivable.pesanan.add', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acc = ArPesananHdr::updateOrCreate(
            ['id_sp_h' => $request->id_sp_h, 'no_dok' => $request->no_dok],
            [
                'id_sp_h' => $request->id_sp_h,
                'no_dok' => $request->no_dok,
                'id_cust' => $request->id_cust,
                'tgl_dok' => $request->tgl_dok,
                'tot_amt' => $request->tot_amt,
                'tgl_input' => \Carbon\Carbon::now(),
                'tgl_update' => \Carbon\Carbon::now(),
                'kode_cabang' => Auth::user()->kode_cabang
            ]
        );

        return redirect(route('PesanDetail.edit',   $acc->id_sp_h));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function show(ArPesananHdr $arPesananHdr)
    {
        return view('content.accountreceivable.pesanan.add', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesan = ArPesananHdr::with('customer', 'detailPesan');
        $trans = Trans::orderBy('id_trans', 'asc')->get();
        $produk = Produk::orderBy('id_produk', 'asc')->get();
        $unit = Unit::orderBy('id_unit', 'asc')->get();
        return view('PesanDetail.edit', compact('pesan', 'trans', 'produk', 'unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArPesananHdr $arPesananHdr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan = ArPesananHdr::find($id);
        $pesan->delete();
        return redirect(route('accountreceivablepesanan.index'));
    }
}
