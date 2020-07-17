@extends('layouts.master')
@section('title', 'Pegawai')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1>Pegawai <small>@yield('title')</small></h1>

			  </div>
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Pegawai</li>
				</ol>
			  </div>
			</div>
		  </div><!-- /.container-fluid -->
		
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        @if (session('success'))
                                   @alert(['type' => 'success'])
                                          {!! session('success') !!}
                                   @endalert
                     @endif
        <div class="card-header">
          <a href="{{ route('pegawai.create') }}" class="btn btn-primary ">
          <i class="fa fa-edit"></i> Tambah
          </a>
        </div>
        <div class="card-body p-0">

          <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                    <thead>
                          <tr>
                                  <td>#</td>
                                  <td>NIK </td>
                                  <td>Nama</td>
                                  <td>Tempat / Tanggal Lahir</td>
                                  <td>Jabatan</td>
                                  <td>Telepon</td>
                                  <td>Command</td>
                          </tr>
                    </thead>

                    <tbody>
                          @php $no = 1; @endphp
                          @forelse ($mstpegawai as $key => $row)
                          <tr>
                                  <td>{{ $mstpegawai->firstItem() +$key }}</td>
                                  <td>{{ $row->nik }}   </td>
                                  <td><strong>{{ ucfirst($row->nama) }}</strong></td>
                                  <td>{{ ucfirst($row->kota_lahir) }} / {{ $row->tgl_lahir }}</td>
                                  <td>{{ $row->jabatan->jabatan }}</td>
                                  <td>{{ $row->cabang->nama_cabang }}</td>
                                  <td >

                                          <form class="konfHapus" action="{{ route('pegawai.destroy', $row->nik) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" ><i class="fa fa-edit" placeholder="Edit"></i></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="tooltip"><i class="fa fa-trash"></i></button>
                                        </form>

                                  </td>
                          </tr>
                          @empty
                          <tr>
                                  <td class="text-center" colspan="7">Tidak ada Data</td>
                          </tr>
                          @endforelse
                    </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          {{ $mstpegawai->links() }}
        </div>
        <!-- /.card-footer-->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection