<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

use Redirect, Response;
use DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getProduk  = Produk::orderBy('id_produk', 'asc')->paginate(10);
        return view('content.produk.index', compact('getProduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.produk.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::updateOrCreate(
            ['id_produk' => $request->id_produk],
            [
                'id_produk' => $request->id_produk,
                'nama' => $request->nama,
                'qty' => $request->qty,
                'hpp' => $request->hpp,
                'harga_jual' => $request->harga_jual,
                'tipe_barang' => $request->tipe_barang,
                'gambar' => Str::slug($request->id_produk) . '_' . Str::Slug($request->nama),
                'flag_status' => $request->flag_status,
                'flag_stok' => $request->flag_stok,
                'flag_sales' => $request->flag_sales,
                'user_stamp' => $request->user_stamp,
                'tgl_input' => $request->tgl_input,
                'tgl_update' => $request->tgl_update,
                'kode_cabang' => $request->kode_cabang
            ]
        );

        return Response::json($produk);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id_produk' => $id);
        $produk = Produk::where($where)->first();
        return Response::json($produk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id_produk', $id)->delete();

        return Response::json($produk);
    }
}
