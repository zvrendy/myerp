<?php

namespace App\Http\Controllers;

use App\Trans;
use Illuminate\Http\Request;
use App\Menu;
use Redirect,Response;
use DataTables;

class TransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        if(request()->ajax()) {
         
            return DataTables::of(trans::query())
            
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id_trans.'" class="edit btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id_trans.'" class="delete btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        
        return view('content.trans.index', compact('getMenu','allMenu'));
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
        $trans = Trans::updateOrCreate(['id_trans' => $request->id_trans],
        [   
            'id_trans' => $request->id_trans,
            'kode_trans' => $request->kode_trans, 
            'keterangan' => $request->keterangan, 
            'akun_debet' => $request->akun_debet, 
            'akun_kredit' => $request->akun_kredit, 
            'kode_cabang' => $request->kode_cabang
        ]);       

        return Response::json($trans);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function show(Trans $trans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id_trans' => $id);
        $trans = trans::where($where)->first();
        return Response::json($trans);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trans $trans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans = trans::where('id_trans',$id)->delete();
  
        return Response::json($trans);
    }
}
