<?php

namespace App\Http\Controllers;

use App\ArPesananHdr;
<<<<<<< HEAD
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
=======
use Illuminate\Http\Request;
use App\Menu;
use Redirect,Response;
use DataTables;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0

class ArPesananHdrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $getARPesananHdr = ArPesananHdr::with('customer')->orderBy('id_sp_h', 'asc')->paginate(20);

        return view('content.accountreceivable.pesanan.index', compact('getARPesananHdr'));
=======
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        if(request()->ajax()) {
         
            return DataTables::of(ArPesananHdr::query())
            
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id_bank.'" class="edit btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id_bank.'" class="delete btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        
        return view('content.accountreceivable.pesanan.index', compact('getMenu','allMenu'));
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $customer = Customer::where('kode_cabang', Auth::user()->kode_cabang)->get(['id_cust', 'nama']);


        return view('content.accountreceivable.pesanan.add', compact('customer'));
=======
        //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
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


=======
        //
    }

>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    /**
     * Display the specified resource.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function show(ArPesananHdr $arPesananHdr)
    {
<<<<<<< HEAD
        return view('content.accountreceivable.pesanan.add', compact('customer'));
=======
        //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit($id)
    {
        $pesan = ArPesananHdr::with('customer', 'detailPesan');
        $trans = Trans::orderBy('id_trans', 'asc')->get();
        $produk = Produk::orderBy('id_produk', 'asc')->get();
        $unit = Unit::orderBy('id_unit', 'asc')->get();
        return view('PesanDetail.edit', compact('pesan', 'trans', 'produk', 'unit'));
=======
    public function edit(ArPesananHdr $arPesananHdr)
    {
        //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD
    public function destroy($id)
    {
        $pesan = ArPesananHdr::find($id);
        $pesan->delete();
        return redirect(route('accountreceivablepesanan.index'));
=======
    public function destroy(ArPesananHdr $arPesananHdr)
    {
        //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }
}
