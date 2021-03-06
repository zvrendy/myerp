<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
<<<<<<< HEAD

use Redirect, Response;
=======
use App\Menu;
use Redirect,Response;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD

        $getProduk  = Produk::orderBy('id_produk', 'asc')->paginate(10);
        return view('content.produk.index', compact('getProduk'));
=======
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        if(request()->ajax()) {
         
            return DataTables::of(Produk::query())
            
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id_produk.'" class="edit btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id_produk.'" class="delete btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        
        return view('content.produk.index', compact('getMenu','allMenu'));
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
        return view('content.produk.add');
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
=======
        $produk = Produk::updateOrCreate(['id_produk' => $request->id_produk],
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
            ]);       

            return Response::json($produk);    

>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD
        $produk = Produk::where('id_produk', $id)->delete();

=======
        $produk = Produk::where('id_produk',$id)->delete();
  
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        return Response::json($produk);
    }
}
