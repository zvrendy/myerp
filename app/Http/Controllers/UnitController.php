<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Menu;
<<<<<<< HEAD
use Redirect, Response;
=======
use Redirect,Response;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD

        $getUnit = Unit::orderBy('id_unit', 'asc')->paginate(10);

        return view('content.unit.index', compact('getUnit'));
=======
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        if(request()->ajax()) {
         
            return DataTables::of(Unit::query())
            
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id_unit.'" class="edit btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id_unit.'" class="delete btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        
        return view('content.unit.index', compact('getMenu','allMenu'));
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD
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
=======
        $unit = unit::updateOrCreate(['id_unit' => $request->id_unit, 'kd_unit' => $request->kd_unit],
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
            ]);       
             
            return Response::json($unit);    
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD
        $unit = unit::where('id_unit', $id)->delete();

=======
        $unit = unit::where('id_unit',$id)->delete();
  
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        return Response::json($unit);
    }
}
