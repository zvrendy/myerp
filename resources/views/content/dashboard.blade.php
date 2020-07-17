@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard <small>@yield('title')</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Title</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">

      <div class="span9">

        <div class="row">
          <div class="col-lg-4 col-xs-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  Customer
                </h3>
                <p>
                  {{ DB::table('mst_customer')->where('kode_cabang', Session::get('cabang'))->count() }} Orang

                </p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('customer.index') }}" class="small-box-footer">
                Kelola Customer <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>Supplier</h3>
                <p>
                  {{ DB::table('mst_supplier')->where('kode_cabang', Session::get('cabang'))->count() }}
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('supplier.index') }}" class="small-box-footer">
                Kelola Supplier<i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>Produk</h3>
                <p>
                  {{ DB::table('mst_produk')->where('kode_cabang', Session::get('cabang'))->count() }}
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('produk.index') }}" class="small-box-footer">
                Kelola Produk<i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>Unit</h3>
                <p>
                  {{ DB::table('mst_unit')->where('kode_cabang', Session::get('cabang'))->count() }}
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('unit.index') }}" class="small-box-footer">
                Kelola Unit<i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Trans</h3>
                <p>
                  {{ DB::table('mst_trans')->where('kode_cabang', Session::get('cabang'))->count() }}

                </p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="{{ route('trans.index') }}" class="small-box-footer">
                Kelola Trans<i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>



      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->

@endsection