<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Redirect,Response;
use DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        if(request()->ajax()) {
         
            return DataTables::of(Menu::query()->with('parents'))
            
            ->addColumn('menu_parent', function($menus){
                return $menus->parents->menu_judul;
            })
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id.'" class="edit-menu btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id.'" class="delete-menu btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('content.menu.index', compact('allMenu','getMenu'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        $allMenu = Menu::pluck('menu_judul', 'id')->all();
        return view('content.menu.add', compact('getMenu', 'allMenu'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'menu_judul' => 'required',
            'menu_link' => 'required',
            'menu_icon' => 'required',
            'menu_parent_id' => 'required',
 
         ]);
 
 
         $inputId = $request->input(empty('menu_parent_id') ? 0 : 'menu_parent_id');
         $input = new Menu($request->all());
         $input->menu_parent_id = $inputId;
         $input->save();
        
 
 
         return back()->with('success', 'Menu added successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $getMenu = Menu::where('menu_parent_id', '=', 0)->get();
        return view('partial.sidebar', compact('getMenu'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $menu  = Menu::where($where)->first();
    
        return Response::json($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::where('id',$id)->delete();
  
        return Response::json($menu);
    }
}
