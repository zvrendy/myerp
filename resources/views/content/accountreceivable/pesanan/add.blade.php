@extends('layouts.app')
@section('title', 'Account Receivable')

@section('content')

<div class="content-header">

       <div class="row mb-2">
              <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Tambah Pesanan</h1>
              </div>
              <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('accountreceivablepesanan.index') }}"> Account Receivable</a></li>
                            <li class="breadcrumb-item active">Add</li>
                     </ol>
              </div>
       </div>

</div>
<!--End Header Content-->

<section class="content">

       <div class="row">
              <div class="col-xl">

                     @slot('title')

                     @endslot

                     @if ($errors->any()) <div class="alert alert-danger">
                            <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                     </div> @endif
                     <form action="{{ route('accountreceivablepesanan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="box-body">

                                   <h4><b>Informasi Pesanan</b></h4>
                                   <hr>
                                   <div class="row">
                                          <div class="col">
                                                 <!-- no dokumen -->
                                                 <div class="form-group row">
                                                        <label for="no_dok" class="col-sm-3 col-form-label">No Dokumen</label>
                                                        <div class="col-sm-6">
                                                               <input type="text" class="form-control form-control-sm" id="no_dok" name="no_dok" placeholder="No Dokumen" maxlength="50" value="{{ old('no_dok') }}">
                                                        </div>
                                                 </div>
                                                 <!-- customer -->
                                                 <div class="form-group row">
                                                        <label for="id_cust" class="col-sm-3 col-form-label">Nama Customer</label>
                                                        <div class="col-sm-6">
                                                               <select id="id_cust" class="custom-select custom-select-sm" name="id_cust">
                                                                      <option value="" selected>Pilih</option>
                                                                      @foreach ($customer as $row)
                                                                      <option value="{{ $row->id_cust }}">{{ $row->nama }}</option>
                                                                      @endforeach
                                                               </select>

                                                        </div>
                                                 </div>
                                                 <!--Tanggal Dokumen-->
                                                 <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Tgl Dokumen</label>
                                                        <div class="col-sm-4">
                                                               <input type="date" name="tgl_dok" class="form-control form-control-sm" data-date-format="yyyy/mm/dd" value="1987-02-22">
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="col">
                                                 <!--Total Amt-->
                                                 <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Total Nilai</label>
                                                        <div class="col-sm-4">
                                                               <input type="text" name="tot_amt" class="form-control form-control-sm" value="0">
                                                        </div>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                            <div class="box-footer">
                                   <div class="form-group">
                                          <button type="submit" class="btn btn-primary">
                                                 <i class="fa fa-send"></i> Simpan
                                          </button>
                                   </div>
                            </div>
                            @slot('footer')
                            a
                            @endslot
                     </form>


              </div>
       </div>

</section>

@endsection