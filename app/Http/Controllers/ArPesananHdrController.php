<?php

namespace App\Http\Controllers;

use App\ArPesananHdr;
use Illuminate\Http\Request;
use App\Menu;
use Redirect,Response;
use DataTables;

class ArPesananHdrController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function show(ArPesananHdr $arPesananHdr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArPesananHdr  $arPesananHdr
     * @return \Illuminate\Http\Response
     */
    public function edit(ArPesananHdr $arPesananHdr)
    {
        //
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
    public function destroy(ArPesananHdr $arPesananHdr)
    {
        //
    }
}
