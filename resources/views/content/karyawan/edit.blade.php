@extends('layouts.app')
@section('title', 'Karyawan')
@section('content')
<!-- Edit Karyawan Modal Form HTML -->
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
                              <li class="breadcrumb-item active">{{ $karyawan->karyawan_nik }}</li>
                         </ol>
                    </div>

               </div>
          </div>
     </section>


	<div class="modal-dialog modal-xl">
		<div class="modal-content">
		<form action="" method="post" enctype="multipart/form-data" >
				
				<div class="modal-body">
					<div class="alert alert-danger" id="edit-error-bag" style="display:none">
						<ul id="edit-karyawan-errors">
						</ul>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">

								@slot('title')

								@endslot

								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif




								<h4><b>Informasi Pribadi</b></h4>
								<hr>

								<div class="row">

									<div class="col-md-6">
										<!--Nama-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nama">Nama</label>
											<div class="col-sm-9 {{ $errors->has('karyawan_nama') ? 'is-invalid':'' }}">
												<input class="form-control form-control-sm" type="text" name="karyawan_nama" id="karyawan_nama" value="{{ $karyawan->karyawan_nama }}">
												@if($errors->has('karyawan_nama'))
												<div class="invalid-feedback text-danger">{{ $errors->first('karyawan_nama') }}</div>
												@endif
											</div>
										</div>
										<!--NamaPanggilan-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nickname">Nama Panggilan</label>
											<div class="col-sm-3 {{ $errors->has('karyawan_nickname') ? 'is-invalid':'' }}">
												<input type="text" name="karyawan_nickname" id="karyawan_nickname" {{-- value="{{ old('karyawan_nickname') }}"--}} class="form-control form-control-sm" value="Endy">
												@if($errors->has('karyawan_nickname'))
												<div class="invalid-feedback text-danger">{{ $errors->first('karyawan_nickname') }}</div>
												@endif
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
											<div class="col-sm-7 {{ $errors->has('karyawan_kotalahir') ? 'is-invalid':'' }}">
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
											<div class="col-sm-3 {{ $errors->has('karyawan_tgllahir') ? 'is-invalid':'' }}">
												<input type="date" name="karyawan_tgllahir" id="karyawan_tgllahir" class="form-control form-control-sm" value="1987-02-22">

											</div>
											@if($errors->has('karyawan_tgllahir'))
											<div class="invalid-feedback text-danger">{{ $errors->first('karyawan_tgllahir') }}</div>
											@endif
										</div>
										<!-- ktp -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_ktp">No Identitas</label>
											<div class=" col-sm-4 {{ $errors->has('karyawan_ktp') ? 'is-invalid':'' }}">
												<input type="text" name="karyawan_ktp" id="karyawan_ktp" class="form-control form-control-sm" value="3578092202870001">
											</div>
										</div>
										<!--Alamattkp-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_alamatktp">Alamat KTP</label>
											<div class=" col-sm-9 {{ $errors->has('karyawan_alamatktp') ? 'is-invalid':''}}">
												<textarea type="text" name="karyawan_alamatktp" id="karyawan_alamatktp" class="form-control form-control-sm" rows="4" cols="50">Jl. Manyar Rejo IX/09 RT 05 RW 05 Kelurahan Menur Pumpungan Kecamatan Sukolilo Surabaya Jawa Timur</textarea>
												<p class="text-danger">{{ $errors->first('karyawan_alamatktp') }}</p>
											</div>
										</div>
										<!--Alamattkp-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_alamat">Alamat KTP</label>
											<div class=" col-sm-9 {{ $errors->has('karyawan_alamat') ? 'is-invalid':''}}">
												<input type="text" name="karyawan_alamat" id="karyawan_alamat" class="form-control form-control-sm" value="Jl. Manyar Rejo IX/09">
												<p class="text-danger">{{ $errors->first('karyawan_alamat') }}</p>
											</div>
										</div>
										<!--Kota-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kota">Kota</label>
											<div class=" col-sm-7 {{ $errors->has('karyawan_kota') ? 'is-invalid':'' }}">
												<input name="karyawan_kota" list="karyawan_kota" placeholder="Pilih Kota" class="form-control form-control-sm" value="Surabaya">
											</div>
											<datalist id="karyawan_kota">
												<option value="" selected>Pilih</option>
												@foreach ($idkota as $row)
												<option value="{{ $row->name }}">
													@endforeach
											</datalist>
											<p class="text-danger">{{ $errors->first('karyawan_kota') }}</p>
											{{-- <input type="text" name="karyawan_kota" value="{{ old('karyawan_kota') }}" id="karyawan_kota" class="form-control {{ $errors->has('karyawan_kota') ? 'is-invalid':'' }}">
											@if($errors->has('karyawan_kota'))
											<div class="invalid-feedback text-danger">{{ $errors->first('karyawan_kota') }}</div>
											@endif --}}

										</div>
										<!--Kodepos-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_kodepos">Kode Pos</label>
											<div class=" col-sm-3 {{ $errors->has('karyawan_kodepos') ? 'is-invalid':''}}">
												<input type="text" name="karyawan_kodepos" id="karyawan_kodepos" class="form-control form-control-sm" value="60118">
												<p class="text-danger">{{ $errors->first('karyawan_kodepos') }}</p>
											</div>
										</div>
										<!-- Agama -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_agama">Agama</label>
											<div class=" col-sm-3 {{ $errors->has('karyawan_agama') ? 'is-invalid':'' }}">
												<select name="karyawan_agama" id="karyawan_agama" required class="custom-select custom-select-sm">
													<option disabled>Pilih Agama</option>
													<option selected value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Katholik">Katholik</option>
													<option value="Buddha">Buddha</option>
													<option value="Kong Hu Cu">Kong Hu Cu</option>
												</select>
											</div>
											{{-- <option value="">Pilih</option>
													@foreach ($agama as $row)
													<option value="{{ $row->karyawan_agama }}">{{ ucfirst($row->agama) }}</option>
											@endforeach--}}
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
													{{--<option value="ch">Cerai</option>
															<option value="cm">Janda/Duda</option>--}}
												</select>
											</div>
											<!-- JmlAnak -->
											<label class="col-sm-2 col-form-label" for="karyawan_jmlanak">Jml Anak</label>
											<div class="col-sm-1 {{ $errors->has('karyawan_jmlanak') ? 'is-invalid':'' }}">
												<input disabled="disabled" type="text" name="karyawan_jmlanak" id="karyawan_jmlanak" style="text-align:center;" class="form-control form-control-sm " value="1">
											</div>
										</div>
										<!--Telepon-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_telepon">No Telepon</label>
											<div class="col-sm-4 {{ $errors->has('karyawan_telepon') ? 'is-invalid':''}}">
												<input type="text" name="karyawan_telepon" id="karyawan_telepon" class="form-control form-control-sm" value="082244124143">
												<p class="text-danger">{{ $errors->first('karyawan_telepon') }}</p>
											</div>
										</div>
										<!--Email-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_email">Email</label>
											<div class="col-sm-4 {{ $errors->has('karyawan_email') ? 'is-invalid':''}}">
												<input type="text" name="karyawan_email" id="karyawan_email" class="form-control form-control-sm" value="zvrendy@gmail.com">
												<p class="text-danger">{{ $errors->first('karyawan_email') }}</p>
											</div>
										</div>



									</div>

									<div class="col-md-6">
										<!-- npwp -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_npwp">N P W P</label>
											<div class=" col-sm-4  {{ $errors->has('karyawan_npwp') ? 'is-invalid':'' }}">
												<input type="text" name="karyawan_npwp" id="karyawan_npwp" class="form-control form-control-sm" value="934247016606000">
											</div>
										</div>
										<!-- bpjskes -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_bpjskes">BPJS Kesehatan</label>
											<div class=" col-sm-4  {{ $errors->has('karyawan_bpjskes') ? 'is-invalid':'' }}">
												<input type="text" name="karyawan_bpjskes" id="karyawan_bpjskes" class="form-control form-control-sm" value="0001720269955">
											</div>
										</div>
										<!-- bpjsket -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_bpjsket">BPJS T. Kerja</label>
											<div class=" col-sm-4  {{ $errors->has('karyawan_bpjsket') ? 'is-invalid':'' }}">
												<input type="text" name="karyawan_bpjsket" id="karyawan_bpjsket" class="form-control form-control-sm" value="20009223502">
											</div>
										</div>
										<!-- foto -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_foto">Foto</label>
											<div class="col-sm-6">
												<input type="file" value="b" name="karyawan_foto" class="form-control form-control-sm ">
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
											<label class="col-sm-3 col-form-label" for="karyawan_cabang">cabang</label>
											<div class=" col-sm-3">
												<select id="karyawan_cabang" class="custom-select custom-select-sm" name="karyawan_cabang">

													<option value="" selected>Pilih</option>
													@foreach ($idcabang as $row)
													<option value="{{ $row->cabang_id }}"{{ $karyawan->cabang_id == $row->cabang_id ? 'selected':'' }}>{{ $row->cabang_nama }}</option>
													@endforeach
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_cabang') }}</p>
										</div>
										<!-- jabatan  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_jabatan">jabatan</label>
											<div class=" col-sm-3">
												<select id="karyawan_jabatan" class="custom-select custom-select-sm" name="karyawan_jabatan">
													<option value="" selected>Pilih</option>
													@foreach ($idjabatan as $row)
													<option value="{{ $row->jabatan_id }}"{{ $karyawan->jabatan_id == $row->jabatan_id ? 'selected':'' }}>{{ $row->jabatan_nama }}</option>
													@endforeach
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_jabatan') }}</p>
											
										</div>
										<!-- departemen  -->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_departemen">departemen</label>
											<div class=" col-sm-3">
												<select id="karyawan_departemen" class="custom-select custom-select-sm" name="karyawan_departemen">
													<option value="" selected>Pilih</option>
													@foreach ($iddepartemen as $row)
													<option value="{{ $row->departemen_id }}"{{ $karyawan->departemen_id == $row->departemen_id ? 'selected':'' }}>{{ $row->departemen_nama }}</option>
													@endforeach
												</select>
											</div>
											<p class="text-danger">{{ $errors->first('karyawan_departemen') }}</p>
										
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
					<input id="karyawan_nik" name="karyawan_nik" type="hidden" value="0">
					<input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
					<button class="btn btn-danger" id="btn-edit" type="button">
						update
					</button>
					</input>
					</input>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('js')
<script>
$(document).ready(function(){ 
	
$(function () {
    $("#karyawan_statuskawin").change(function () {
        if ($(this).val() == "K") {
            $("#karyawan_jmlanak").removeAttr("readonly");
            $("#karyawan_jmlanak").focus();
        } else {
            $("#karyawan_jmlanak").val("0");
            $("#karyawan_jmlanak").attr("readonly", "readonly");
        }
    });
});


$(".btn-edit").click(function(e){

	e.preventDefault();
	var _token = $("input[name='_token']").val();
	var karyawan_nik= $("input[name=karyawan_nik]").val();
	var karyawan_nama= $("input[name=karyawan_nama]").val();
	var karyawan_nickname= $("input[name=karyawan_nickname]").val();
    	var karyawan_ktp= $("input[name=karyawan_ktp]").val();
    var karyawan_alamatktp= $("textarea[name=karyawan_alamatktp]").val();
    var karyawan_gender= $("select[name=karyawan_gender]").val();
    var karyawan_agama= $("select[name=karyawan_agama]").val();
    var karyawan_statuskawin= $("select[name=karyawan_statuskawin]").val();
    var karyawan_jmlanak= $("input[name=karyawan_jmlanak]").val();
    var karyawan_kotalahir= $("input[name=karyawan_kotalahir]").val();
    var karyawan_tgllahir= $("input[name=karyawan_tgllahir]").val();
    var karyawan_alamat= $("input[name=karyawan_alamat]").val();
    var karyawan_kota= $("input[name=karyawan_kota]").val();
    var karyawan_kodepos= $("input[name=karyawan_kodepos]").val();
    var karyawan_email= $("input[name=karyawan_email]").val();
    var karyawan_telepon= $("input[name=karyawan_telepon]").val();
    var karyawan_npwp= $("input[name=karyawan_npwp]").val();
    var cabang_id= $("select[name=cabang_id]").val();
    var jabatan_id= $("select[name=jabatan_id]").val();
    var departemen_id= $("select[name=departemen_id]").val();
    var karyawan_level= $("select[name=karyawan_level]").val();
    var karyawan_aktif= $("select[name=karyawan_aktif]").val();
    var karyawan_bpjskes= $("input[name=karyawan_bpjskes]").val();
    var karyawan_bpjsket= $("input[name=karyawan_bpjsket]").val();
    var karyawan_foto= $("input[name=karyawan_foto]").val();

	$.ajax({

		url: "/administrator/karyawan",

		type:'POST',

		data: {_token:_token, karyawan_nik:karyawan_nik, karyawan_nama:karyawan_nama, karyawan_nickname:karyawan_nickname, karyawan_ktp:karyawan_ktp, karyawan_alamatktp:karyawan_alamatktp, karyawan_gender:karyawan_gender, karyawan_agama:karyawan_agama, karyawan_statuskawin:karyawan_statuskawin, karyawan_jmlanak:karyawan_jmlanak, karyawan_kotalahir:karyawan_kotalahir, karyawan_tgllahir:karyawan_tgllahir, karyawan_alamat:karyawan_alamat, karyawan_kota:karyawan_kota, karyawan_kodepos:karyawan_kodepos, karyawan_email:karyawan_email, karyawan_telepon:karyawan_telepon, karyawan_npwp:karyawan_npwp, cabang_id:cabang_id, jabatan_id:jabatan_id, departemen_id:departemen_id, karyawan_level:karyawan_level, karyawan_aktif:karyawan_aktif, karyawan_bpjskes:karyawan_bpjskes, karyawan_bpjsket:karyawan_bpjsket, karyawan_foto:karyawan_foto },

		success: function(data) {

			if($.isEmptyObject(data.error)){
				alert("Success [" + karyawan_nik + "] - " + karyawan_nama  );
				 window.location.reload();
			
				
			}else{

				printErrorMsg(data.error);

			}

		}

	});


}); 


function printErrorMsg (msg) {

	$(".print-error-msg").find("ul").html('');

	$(".print-error-msg").css('display','block');

	$.each( msg, function( key, value ) {

		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');

	});

}

});
@endsection