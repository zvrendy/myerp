<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Session;
use Redirect, Response;
=======
use App\Menu;
use Redirect,Response;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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
<<<<<<< HEAD

        $getCustomer = Customer::where('kode_cabang', Session::get('cabang'))->orderBy('id_cust', 'asc')->paginate(10);

        return view('content.customer.index', compact('getCustomer'));
=======
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

        return view('content.customer.add');
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

        $custId = $request->id_cust;
<<<<<<< HEAD

        $customer = Customer::updateOrCreate(
            ['id_cust' => $request->id_cust],
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
            ]
        );
        return redirect(route('customer.index'))->with(['success' => 'Customer: ' . $customer->nama . ' Ditambahkan']);
        // return Response::json($customer);
=======
        
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
        
   

>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
<<<<<<< HEAD
        return view('content.customer.index');
=======
        //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit($id)
    {
        // $where = array('id_cust' => $id);
        // $customer = Customer::where($where)->first();
        $customer = Customer::find($id);
        // dd($customer);

        return view('content.customer.edit', compact('customer'));
        // return Response::json($customer);
=======
    public function edit($id_cust)
    {
        $where = array('id_cust' => $id_cust);
        $customer = Customer::where($where)->first();
        return Response::json($customer);
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {

        $customer = customer::find($id)->update([
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


        return redirect(route('customer.index'));
=======
    public function update(Request $request, Customer $customer)
    {
        //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $customer = Customer::where('id_cust', $id)->delete();

        return redirect()->back();
=======
        $customer = Customer::where('id_cust',$id)->delete();
  
        return Response::json($customer);
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }
}
