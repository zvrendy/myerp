<!-- Tambah Karyawan Modal Form HTML -->
<div id="AddModal" class="modal fade" role="dialog">

	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data" >
			
				<div class="modal-header">
					<h4 class="modal-title">
						Tambah Karyawan Baru
					</h4>
					<button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
				</div>
					<div class="alert alert-danger print-error-msg" style="display:none">
					<button type="button" class="close" data-dismiss="alert">×</button> 
						<ul></ul>

					</div>
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
												<input type="text" class="form-control form-control-sm" name="karyawan_nik" id="karyawan_nik" placeholder="NIK" value="220287">
											</div>
										</div>
										<!--Nama-->
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="karyawan_nama">Nama</label>
											<div class="col-sm-9 {{ $errors->has('karyawan_nama') ? 'is-invalid':'' }}">
												<input class="form-control form-control-sm" type="text" name="karyawan_nama" id="karyawan_nama" value="Akhmad Efendy Mooduto">
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
												<input readonly type="text" name="karyawan_jmlanak" id="karyawan_jmlanak" style="text-align:center;" class="form-control form-control-sm" value="1">
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
												<input id="karyawan_foto" type="file" accept="image/jpg,image/jpeg,image/png" name="karyawan_foto" class="form-control form-control-sm ">
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
											{{-- <input type="text" name="cabang_id" value="{{ old('cabang_id') }}" id="cabang_id" class="form-control {{ $errors->has('cabang_id') ? 'is-invalid':'' }}">
											@if($errors->has('cabang_id'))
											<div class="invalid-feedback text-danger">{{ $errors->first('cabang_id') }}</div>
											@endif --}}
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
											{{-- <input type="text" name="jabatan_id" value="{{ old('jabatan_id') }}" id="jabatan_id" class="form-control {{ $errors->has('jabatan_id') ? 'is-invalid':'' }}">
											@if($errors->has('jabatan_id'))
											<div class="invalid-feedback text-danger">{{ $errors->first('jabatan_id') }}</div>
											@endif --}}
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
											{{-- <input type="text" name="departemen_id" value="{{ old('departemen_id') }}" id="departemen_id" class="form-control {{ $errors->has('departemen_id') ? 'is-invalid':'' }}">
											@if($errors->has('departemen_id'))
											<div class="invalid-feedback text-danger">{{ $errors->first('departemen_id') }}</div>
											@endif --}}
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
					<input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancel">
					<button class="btn btn-primary btn-submit">
                                                                      <i class="fa fa-send"></i> Simpan
                                                                      </button>
					</input>
				</div>
			</form>
		</div>
	</div>
</div>

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


$(".btn-submit").click(function(e){

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
//     var karyawan_foto= $("input[name=karyawan_foto]").val()
    var karyawan_foto= document.getElementById("karyawan_foto").files[0].name;
	$.ajax({

		url: "/administrator/karyawan",

		type:'POST',

		data: {_token:_token, karyawan_nik:karyawan_nik, karyawan_nama:karyawan_nama, karyawan_nickname:karyawan_nickname, karyawan_ktp:karyawan_ktp, karyawan_alamatktp:karyawan_alamatktp, karyawan_gender:karyawan_gender, karyawan_agama:karyawan_agama, karyawan_statuskawin:karyawan_statuskawin, karyawan_jmlanak:karyawan_jmlanak, karyawan_kotalahir:karyawan_kotalahir, karyawan_tgllahir:karyawan_tgllahir, karyawan_alamat:karyawan_alamat, karyawan_kota:karyawan_kota, karyawan_kodepos:karyawan_kodepos, karyawan_email:karyawan_email, karyawan_telepon:karyawan_telepon, karyawan_npwp:karyawan_npwp, cabang_id:cabang_id, jabatan_id:jabatan_id, departemen_id:departemen_id, karyawan_level:karyawan_level, karyawan_aktif:karyawan_aktif, karyawan_bpjskes:karyawan_bpjskes, karyawan_bpjsket:karyawan_bpjsket, karyawan_foto:karyawan_foto },

		success: function(data) {

			if($.isEmptyObject(data.error)){
				alert("Success [" + karyawan_nik + "] - " + karyawan_nama  );
				 console.log(karyawan_foto);
				
			
				
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
$(document).ready(function(){ 
$(".btn-add").click(function (e) {
	e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/administrator/karyawan',
            data: {
			  _token: $("input[name='_token']").val(),
                karyawan_nik: $("input[name=karyawan_nik]").val(),
                karyawan_nama: $("input[name=karyawan_nama]").val(),
                karyawan_nickname: $("input[name=karyawan_nickname]").val(),
                karyawan_ktp: $("input[name=karyawan_ktp]").val(),
                karyawan_alamatktp: $("textarea[name=karyawan_alamatktp]").val(),
                karyawan_gender: $("select[name=karyawan_gender]").val(),
                karyawan_agama: $("select[name=karyawan_agama]").val(),
                karyawan_statuskawin: $("select[name=karyawan_statuskawin]").val(),
                karyawan_jmlanak: $("input[name=karyawan_jmlanak]").val(),
                karyawan_kotalahir: $("input[name=karyawan_kotalahir]").val(),
                karyawan_tgllahir: $("input[name=karyawan_tgllahir]").val(),
                karyawan_alamat: $("input[name=karyawan_alamat]").val(),
                karyawan_kota: $("input[name=karyawan_kota]").val(),
                karyawan_kodepos: $("input[name=karyawan_kodepos]").val(),
                karyawan_email: $("input[name=karyawan_email]").val(),
                karyawan_telepon: $("input[name=karyawan_telepon]").val(),
                karyawan_npwp: $("input[name=karyawan_npwp]").val(),
                karyawan_cabang: $("select[name=karyawan_cabang]").val(),
                karyawan_jabatan: $("select[name=karyawan_jabatan]").val(),
                karyawan_departemen: $("select[name=karyawan_departemen]").val(),
                karyawan_level: $("select[name=karyawan_level]").val(),
                karyawan_aktif: $("select[name=karyawan_aktif]").val(),
                karyawan_bpjskes: $("input[name=karyawan_bpjskes]").val(),
                karyawan_bpjsket: $("input[name=karyawan_bpjsket]").val(),
                karyawan_foto: $("input[name=karyawan_foto]").val(),

            },
      
            success: function (data) {
                $('#AddModal').trigger("reset");
                $("#AddModal .close").click();
               //  window.location.reload();
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-task-errors').html('');
                $.each(errors.messages, function (key, value) {
                    $('#add-task-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });
    
}); 

</script>
@endsection