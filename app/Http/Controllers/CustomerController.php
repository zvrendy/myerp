<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect, Response;
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

        $getCustomer = Customer::where('kode_cabang', Session::get('cabang'))->orderBy('id_cust', 'asc')->paginate(10);

        return view('content.customer.index', compact('getCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('content.customer.add');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('content.customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $where = array('id_cust' => $id);
        // $customer = Customer::where($where)->first();
        $customer = Customer::find($id);
        // dd($customer);

        return view('content.customer.edit', compact('customer'));
        // return Response::json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id_cust', $id)->delete();

        return redirect()->back();
    }
}
