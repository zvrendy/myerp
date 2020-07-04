<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Menu;
use Redirect,Response;
use DataTables;

class CustomerController extends Controller
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
         
            return DataTables::of(Customer::query())
            
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" data-id="'.$data->id_cust.'" class="edit-customer btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit" ></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="'.$data->id_cust.'" class="delete-customer btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash" ></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        
        return view('content.customer.index', compact('getMenu','allMenu'));
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

        $custId = $request->id_cust;
        
        $customer = Customer::updateOrCreate(['id_cust' => $request->id_cust],
                    [   
                        'id_cust' => $request->id_cust,
                        'nama' => $request->nama, 
                        'ktp' => $request->ktp, 
                        'npwp' => $request->npwp, 
                        'tipe' => $request->tipe, 
                        'alamat' => $request->alamat, 
                        'kontak_person' => $request->kontak_person, 
                        'nama_dagang' => $request->nama_dagang, 
                        'alamat_dagang' => $request->alamat_dagang, 
                        'telp' => $request->telp, 
                        'fax' => $request->fax, 
                        'kode_cabang' => $request->kode_cabang
                        ]);       
   
        return Response::json($customer);
        
   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cust)
    {
        $where = array('id_cust' => $id_cust);
        $customer = Customer::where($where)->first();
        return Response::json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id_cust',$id)->delete();
  
        return Response::json($customer);
    }
}
