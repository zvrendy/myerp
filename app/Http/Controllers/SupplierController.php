<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Redirect, Response;
=======
use App\Menu;
use Redirect,Response;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD
        $getSupplier = Supplier::where('kode_cabang', session()->get('cabang'))->orderBy('id_supp', 'asc')->paginate(10);
        return view('content.supplier.index', compact('getSupplier'));
=======
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        if(request()->ajax()) {
         
            return DataTables::of(supplier::query())
            
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id_supp.'" class="edit btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id_supp.'" class="delete btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        
        return view('content.supplier.index', compact('getMenu','allMenu'));
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
        return view('content.supplier.add');
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
=======
        $supplier = Supplier::updateOrCreate(['id_supp' => $request->id_supp],
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
        ]);       
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0

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
<<<<<<< HEAD
        $supplier = Supplier::find($id);
        // dd($supplier);

        return view('content.supplier.edit', compact('supplier'));
=======
        $where = array('id_supp' => $id);
        $supplier = Supplier::where($where)->first();
        return Response::json($supplier);
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD
        $supplier = Supplier::where('id_supp', $id)->delete();

        return redirect()->back();
=======
        $supplier = Supplier::where('id_supp',$id)->delete();
  
        return Response::json($supplier);
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }
}
