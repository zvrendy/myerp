@extends('layouts.app')
@section('title', 'Karyawan')
@section('content')

     <!-- Content Header (Page header) -->
     <section class="content-header">
          <div class="container-fluid">
               <div class="row">

                    <div class="col-sm-6">
                         <h2>[{{ $karyawan->karyawan_nik }}] <b>{{ $karyawan->karyawan_nama }}</b></h2>
                    </div>

                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Daftar Karyawan</a></li>
                              <li class="breadcrumb-item active">{{ $karyawan->karyawan_nik }}</li>
                         </ol>
                    </div>

               </div>
          </div>
     </section>

	<div class="modal-dialog modal-xl">
		<div class="modal-content">
		
			
				<div class="modal-header">
					<h4 class="modal-title">
						
								<b>Informasi Pribadi</b>
					</h4>
					<button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
				</div>
				
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">

								

								<div class="row">

									<div class="col-md-6">
										<!-- NIK -->
										<div class="form-group row">
											<label for="karyawan_nik" class="col-sm-3 col-form-label">NIK</label>
											<label class="col-sm-3 col-form-label">
                                                       {{ $karyawan->karyawan_nik }}
											</label>
										</div>
										<!--Nama-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nama">Nama</label>
											<label class="col-sm-9 col-form-label">
											{{ $karyawan->karyawan_nama }}
											</label>
										</div>
										<!--NamaPanggilan-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nickname">Nama Panggilan</label>
											<label class="col-sm-3 col-form-label">
                                                       {{ $karyawan->karyawan_nickname }}
											</label>
										</div>
										<!--gender-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_gender">Jenis Kelamin</label>
											@if($karyawan->karyawan_gender == 'L')
											<label class="col-sm-3 col-form-label">Laki - Laki
											</label>
											@else
											<label class="col-sm-3 col-form-label">Perempuan
											</label>
											@endif
										</div>
										<!--Tempat Lahir-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kotalahir">Tempat Lahir</label>
											<label class="col-sm-7 col-form-label">
                                                       {{ $karyawan->karyawan_kotalahir }}
											</label>
											

										</div>
										<!--Tanggal Lahir-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
											<label class="col-sm-3 col-form-label">
											{{ date('d/m/Y', strtotime($karyawan->karyawan_tgllahir)) }}
										</label>
										</div>
										<!-- ktp -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_ktp">No Identitas</label>
											<label class="col-sm-4 col-form-label">
											{{ $karyawan->karyawan_ktp }}
											</label>
										</div>
										<!--Alamattkp-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_alamatktp">Alamat KTP</label>
											<label class="col-form-label col-sm-9">
											{{ $karyawan->karyawan_alamatktp }}
											</label>
										</div>
										<!--Alamattkp-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_alamat">Alamat KTP</label>
											<label class="col-form-label col-sm-9">
											{{ $karyawan->karyawan_alamat }}
											</label>
										</div>
										<!--Kota-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kota">Kota</label>
											<label class="col-form-label col-sm-7">
											{{ $karyawan->karyawan_kota }}
											</label>
										</div>
										<!--Kodepos-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kodepos">Kode Pos</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->karyawan_kodepos }}
											</label>
										</div>
										<!-- Agama -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_agama">Agama</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->karyawan_agama }}
											</label>
											
										</div>
										<!--STATUS-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_statuskawin">Status Kawin</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->karyawan_statuskawin }}
											</label>
											<!-- JmlAnak -->
											<label class="col-sm-2 col-form-label" for="karyawan_jmlanak">Jml Anak</label>
											<label class="col-form-label col-sm-1">{{ $karyawan->karyawan_jmlanak }}
											</label>
										</div>
										<!--Telepon-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_telepon">No Telepon</label>
											<label class="col-form-label col-sm-4">
											{{ $karyawan->karyawan_telepon }}
											</label>
										</div>
										<!--Email-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_email">Email</label>
											<label class="col-form-label col-sm-4">{{ $karyawan->karyawan_email }}
											</label>
										</div>



									</div>

									<div class="col-md-6">
										<!-- foto -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_foto">Foto</label>
											<label class="col-form-label col-sm-6">
											{{ $karyawan->karyawan_foto }}
											</label>
										</div>
										<img class="img-fluid rounded-circle" src="{{ asset('storage/karyawan/' . $karyawan->karyawan_foto) }}" alt="{{ $karyawan->karyawan_foto }}">
										<!-- npwp -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_npwp">N P W P</label>
											<label class="col-form-label col-sm-4">
											{{ $karyawan->karyawan_npwp }}
											</label>
										</div>
										<!-- bpjskes -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_bpjskes">BPJS Kesehatan</label>
											<label class="col-form-label col-sm-4">
											{{ $karyawan->karyawan_bpjskes }}
											</label>
										</div>
										<!-- bpjsket -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_bpjsket">BPJS T. Kerja</label>
											<label class="col-form-label col-sm-4">
											{{ $karyawan->karyawan_bpjsket }}
											</label>
										</div>
										<!-- status -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_aktif">Status</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->karyawan_aktif }}
											</label>
										</div>
										<!-- cabang  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="cabang_id">cabang</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->cabang->cabang_nama ?? 'NULL' }}
											</label>
										</div>
										<!-- jabatan  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="jabatan_id">jabatan</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->jabatan->jabatan_nama ?? 'NULL' }}
											</label>
										</div>
										<!-- departemen  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="departemen_id">departemen</label>
											<label class="col-form-label col-sm-3">
											{{ $karyawan->departemen->departemen_nama ?? 'NULL' }}
											</label>
										
										</div>
									</div>
								</div>

								@slot('footer')

								@endslot

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="{{ route('karyawan.index') }}" class="btn btn-secondary" type="button" value="Cancel">
					Kembali</a>
				</div>
			
		</div>
	</div>



@endsection