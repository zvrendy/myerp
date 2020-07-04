@extends('layouts.app')
@section('title', 'Karyawan')
@section('content')



<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-6">
				<h2>Daftar <b>Karyawan</b></h2>
			</div>

			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Daftar Karyawan</li>
				</ol>
			</div>

		</div>
	</div>
</section>

<section class="content">
	<div class="card">
		<div class="card-header">
		<a href="{{ route('karyawan.create') }}" class="btn btn-sm btn-success float-left"><i class="fas fa-plus-circle"></i><span> Tambah</span></a>
			
		</div>
		<div class="card-body p-0">
		@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif

		@if (session('error'))
			<div class="alert alert-danger">{{ session('error') }}</div>
		@endif
			<table class="table table-bordered table-sm text-nowrap">
				<thead>
					<tr>
						<th>No.</th>
						<th>NIK</th>
						<th>Nama Lengkap</th>
						<th>L/P</th>
						<th>Tanggal Lahir</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Jabatan</th>
						<th>Departemen</th>
						<th>Cabang</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@forelse($indexKaryawan as $key => $iK)
					<tr>
						<td>{{$indexKaryawan->firstItem() + $key }}</td>
						<td>{{$iK->karyawan_nik}}</td>
						<td>{{$iK->karyawan_nama}}</td>
						<td align="center">{{$iK->karyawan_gender}}</td>
						<td align="center">{{ date('d/m/Y', strtotime($iK->karyawan_tgllahir)) }}</td>
						<td>{{$iK->karyawan_alamat}}</td>
						<td>{{$iK->karyawan_kota}}</td>
						<td>{{$iK->jabatan->jabatan_nama ?? ''}}</td>
						<td>{{$iK->departemen->departemen_nama ?? ''}}</td>
						<td>{{$iK->cabang->cabang_nama ?? ''}}</td>
						<td>
						
						   <!-- FORM ACTION UNTUK METHOD DELETE -->
						   <a class="btn btn-sm btn-success" href="{{ route('karyawan.show', $iK->karyawan_nik) }}"><i class="fa fa-eye" ></i></a>
						   <a class="btn btn-sm btn-info" href="{{ route('karyawan.edit', $iK->karyawan_nik) }}"><i class="fa fa-edit" ></i></a>
							<a href="javascript:;" data-toggle="modal" onclick="deleteData({{$iK->karyawan_nik}})" data-target="#DeleteModal" class="btn btn-sm btn-danger" data-tooltips="Hapus" placeholder="Hapus"><i class="fa fa-trash" ></i></a>
							
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="5" class="text-center">Tidak ada data</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		
	</div>
</section>

@include('content.karyawan.delete')

@endsection

@section('js')

@endsection