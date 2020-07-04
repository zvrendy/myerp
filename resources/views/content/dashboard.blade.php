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
                <div class="col-lg-3 col-xs-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                Customer
                            </h3>
                            <p >
                                {{-- {{ DB::table('karyawan')->count() }} Orang --}}
                                11 Orang
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
                <div class="col-lg-3 col-xs-12">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Company</h3>
                            <p>
                            {{-- {{ DB::table('cabang')->count() }}  --}}
                                11 Project
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-flag"></i>
                        </div>
                        <a href="cabang" class="small-box-footer" >
                            Kelola Project<i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-12">
                    <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>Users</h3>
                        <p id="numberOfUsers">
                            11 Users
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer" id="usersLink">
                        Manage Users <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-12">
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Projects</h3>
                        <p id="numberOfProjects">
                            4 Active Projects
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pie-chart"></i>
                    </div>
                    <a href="#" class="small-box-footer" id="projectsLink">
                        Update Clients/Projects <i class="fa fa-arrow-circle-right"></i>
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