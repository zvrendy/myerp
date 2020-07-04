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
                              <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Daftar Karyawan</a></li>
                              <li class="breadcrumb-item active">Tambah</li>
                         </ol>
                    </div>

               </div>
          </div>
     </section>

<!-- Tambah Karyawan Modal Form HTML -->


	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data" >
			@csrf
				<div class="modal-header">
					<h4 class="modal-title">
						Tambah Karyawan Baru
					</h4>
					<button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
				</div>
				

				@if($errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					<ul>{{ $error }}</ul>		
					@endforeach
				</div>
				@endif
					
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">

								<h4><b>Informasi Pribadi</b></h4>
								<hr>

								<div class="row">

									<div class="col-md-6">
										<!-- NIK -->
										<div class="form-group row">
											<label for="karyawan_nik" class="col-sm-3 col-form-label">NIK</label>
											<div class="col-sm-3">
												<input type="text" class="form-control form-control-sm" name="karyawan_nik"  placeholder="NIK" value="220287">
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_nik') }}</p>
										</div>
										<!--Nama-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nama">Nama</label>
											<div class="col-sm-9">
												<input class="form-control form-control-sm" type="text" name="karyawan_nama" value="Akhmad Efendy Mooduto">
												<p class="text-danger">{{ $errors->first('karyawan_nama') }}</p>
											</div>
										</div>
										<!--NamaPanggilan-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nickname">Nama Panggilan</label>
											<div class="col-sm-3">
												<input type="text" name="karyawan_nickname" class="form-control form-control-sm" value="Endy">
												<p class="text-danger">{{ $errors->first('karyawan_nickname') }}</p>
											</div>
										</div>
										<!--gender-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_gender">Jenis Kelamin</label>
											<div class="col-sm-3">
												<select class="custom-select custom-select-sm">
													<option disabled>Pilih Gender</option>
													<option selected value="L">Laki - Laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>
										<!--Tempat Lahir-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kotalahir">Tempat Lahir</label>
											<div class="col-sm-7">
												<input name="karyawan_kotalahir" list="karyawan_kotalahir" placeholder="Pilih Kota" class="form-control form-control-sm " value="Surabaya">
											</div>
											<datalist id="karyawan_kotalahir">
												<option value="" selected>Pilih</option>
												@foreach ($idkota as $row)
												<option value="{{ $row->name }}">
													@endforeach
											</datalist>

										</div>
										<!--Tanggal Lahir-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
											<div class="col-sm-3">
												<input type="date" name="karyawan_tgllahir" class="form-control form-control-sm" data-date-format="yyyy/mm/dd" value="1987-02-22">
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_tgllahir') }}</p>
										</div>
										<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
											<input class="form-control" type="text" name="">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
										<!-- ktp -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_ktp">No Identitas</label>
											<div class=" col-sm-4">
												<input type="text" name="karyawan_ktp" class="form-control form-control-sm" value="3578092202870001">
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_ktp') }}</p>
										</div>
										<!--Alamattkp-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_alamatktp">Alamat KTP</label>
											<div class=" col-sm-9">
												<textarea type="text" name="karyawan_alamatktp" id="karyawan_alamatktp" class="form-control form-control-sm" rows="4" cols="50">Jl. Manyar Rejo IX/09 RT 05 RW 05 Kelurahan Menur Pumpungan Kecamatan Sukolilo Surabaya Jawa Timur</textarea>
												<p class="text-danger">{{ $errors->first('karyawan_alamatktp') }}</p>
											</div>
										</div>
										<!--Alamattkp-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_alamat">Alamat KTP</label>
											<div class=" col-sm-9">
												<input type="text" name="karyawan_alamat" class="form-control form-control-sm" value="Jl. Manyar Rejo IX/09">
												<p class="text-danger">{{ $errors->first('karyawan_alamat') }}</p>
											</div>
										</div>
										<!--Kota-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kota">Kota</label>
											<div class=" col-sm-7">
												<input name="karyawan_kota" list="karyawan_kota" placeholder="Pilih Kota" class="form-control form-control-sm" value="Surabaya">
											</div>
											<datalist id="karyawan_kota">
												<option value="" selected>Pilih</option>
												@foreach ($idkota as $row)
												<option value="{{ $row->name }}">
													@endforeach
											</datalist>
											<p class="text-danger">{{ $errors->first('karyawan_kota') }}</p>
										</div>
										<!--Kodepos-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kodepos">Kode Pos</label>
											<div class=" col-sm-3">
												<input type="text" name="karyawan_kodepos" class="form-control form-control-sm" value="60118">
												<p class="text-danger">{{ $errors->first('karyawan_kodepos') }}</p>
											</div>
										</div>
										<!-- Agama -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_agama">Agama</label>
											<div class=" col-sm-3">
												<select name="karyawan_agama" id="karyawan_agama" required class="custom-select custom-select-sm">
													<option disabled>Pilih Agama</option>
													<option selected value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Katholik">Katholik</option>
													<option value="Buddha">Buddha</option>
													<option value="Kong Hu Cu">Kong Hu Cu</option>
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_agama') }}</p>
										</div>
										<!--STATUS-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_statuskawin">Status Kawin</label>
											<div class=" col-sm-3">
												<select id="karyawan_statuskawin" class="custom-select custom-select-sm" name="karyawan_statuskawin">
													<option disabled selected>Pilih</option>
													<option value="TK">Belum Kawin</option>
													<option selected value="K">Kawin</option>
													
												</select>
											</div>
											<!-- JmlAnak -->
											<label class="col-sm-2 col-form-label" for="karyawan_jmlanak">Jml Anak</label>
											<div class="col-sm-1">
												<input readonly type="text" name="karyawan_jmlanak" id="karyawan_jmlanak" style="text-align:center;" class="form-control form-control-sm" value="1">
											</div>
										</div>
										<!--Telepon-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_telepon">No Telepon</label>
											<div class="col-sm-4">
												<input type="text" name="karyawan_telepon" class="form-control form-control-sm" value="082244124143">
												<p class="text-danger">{{ $errors->first('karyawan_telepon') }}</p>
											</div>
										</div>
										<!--Email-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_email">Email</label>
											<div class="col-sm-4">
												<input type="text" name="karyawan_email" class="form-control form-control-sm" value="zvrendy@gmail.com">
												<p class="text-danger">{{ $errors->first('karyawan_email') }}</p>
											</div>
										</div>



									</div>

									<div class="col-md-6">
										<!-- npwp -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_npwp">N P W P</label>
											<div class=" col-sm-4">
												<input type="text" name="karyawan_npwp" class="form-control form-control-sm" value="934247016606000">
											</div>
										</div>
										<!-- bpjskes -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_bpjskes">BPJS Kesehatan</label>
											<div class=" col-sm-4">
												<input type="text" name="karyawan_bpjskes"  class="form-control form-control-sm" value="0001720269955">
											</div>
										</div>
										<!-- bpjsket -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_bpjsket">BPJS T. Kerja</label>
											<div class=" col-sm-4">
												<input type="text" name="karyawan_bpjsket"  class="form-control form-control-sm" value="20009223502">
											</div>
										</div>
										<!-- foto -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_foto">Foto</label>
											<div class="col-sm-6">
												<input type="file" name="karyawan_foto" class="form-control form-control-sm ">
												<p class="text-danger">{{ $errors->first('karyawan_foto') }}</p>
											</div>
										</div>
										<!-- status -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_aktif">Status</label>
											<div class="col-sm-3">
												<select id="karyawan_aktif" class="custom-select custom-select-sm" name="karyawan_aktif">
													<option value="aktif" selected>Aktif</option>
													<option value="tidak aktif">Tidak Aktif</option>
												</select>
											</div>
										</div>
										<!-- cabang  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="cabang_id">cabang</label>
											<div class=" col-sm-3">
												<select id="cabang_id" class="custom-select custom-select-sm" name="cabang_id">

													<option value="" selected>Pilih</option>
													@foreach ($idcabang as $row)
													<option value="{{ $row->cabang_id }}">{{ $row->cabang_nama }}</option>
													@endforeach
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('cabang_id') }}</p>
										</div>
										<!-- jabatan  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="jabatan_id">jabatan</label>
											<div class=" col-sm-3">
												<select id="jabatan_id" class="custom-select custom-select-sm" name="jabatan_id">
													<option value="" selected>Pilih</option>
													@foreach ($idjabatan as $row)
													<option value="{{ $row->jabatan_id }}">{{ $row->jabatan_nama }}</option>
													@endforeach
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('jabatan_id') }}</p>
										</div>
										<!-- departemen  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="departemen_id">departemen</label>
											<div class=" col-sm-3">
												<select id="departemen_id" class="custom-select custom-select-sm" name="departemen_id">
													<option value="" selected>Pilih</option>
													@foreach ($iddepartemen as $row)
													<option value="{{ $row->departemen_id }}">{{ $row->departemen_nama }}</option>
													@endforeach
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('departemen_id') }}</p>
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
					<button class="btn btn-primary btn-submit">
                                                                      <i class="fa fa-send"></i> Simpan
                                                                      </button>
					</input>
				</div>
			</form>
		</div>
	</div>


@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('karyawan_alamatktp');
    </script>
<script>
$(function () {
    $("#karyawan_aktif").change(function () {
        if ($(this).val() == "K") {
            $("#karyawan_jmlanak").removeAttr("disabled");
            $("#karyawan_jmlanak").focus();
        } else {
            $("#karyawan_jmlanak").val("0");
            $("#karyawan_jmlanak").attr("disabled", "disabled");
        }
    });
});
$(function(){
		$("#datepicker").datepicker({
			autoclose: true,
			todayHighlight: true,
			dateFormat: 'dd/mm/yyyy'
		}).datepicker('update', new Date());
	});
</script>
@endsection