@extends('layouts.master')
@section('title', 'Tambah Pegawai')
@section('content')

       <div class="content-wrapper">
              <div class="content-header">
                     <div class="container-fluid">
                            <div class="row mb-2">
                                   <div class="col-sm-6">
                                          <h1 class="m-0 text-dark">Tambah Pegawai</h1>
                                   </div>
                                   <div class="col-sm-6">
                                          <ol class="breadcrumb float-sm-right">
                                                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                 <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}"></a> Pegawai</li>
                                                 <li class="breadcrumb-item active">Tambah</li>
                                          </ol>
                                   </div>
                            </div>
                     </div>
              </div><!--End Header Content-->

              <section class="content">
                     <div class="container-fluid">
                            <div class="row">
                                   <div class="col-md-12">

                                                 @slot('title')

                                                 @endslot

                                                      @if ($errors->any()) <div class="alert alert-danger"> <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> </div> @endif
                                                 <form  action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="box-body">

                                                               <h4><b>Informasi Pribadi</b></h4>
                                                               <hr>

                                                               <div class="row">

                                                                      <div class="col-md 6">

                                                                                    <div class="form-group"><!--Nama-->
                                                                                           <label for="nama">Nama Pegawai</label>
                                                                                           <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" required>
                                                                                           @if($errors->has('nama'))
                                                                                           <div class="invalid-feedback text-danger">{{ $errors->first('nama') }}</div>
                                                                                           @endif
                                                                                    </div>
                                                                                    <div class="form-group"><!--gender-->
                                                                                           <label for="gender" class="col-md-4 control-label">Jenis Kelamin</label>

                                                                                           <div class="col-md-12">
                                                                                                  <label class="radio-inline">
                                                                                                  <input type="radio" name="gender" value="p" checked="checked">
                                                                                                  Pria
                                                                                                  </label>

                                                                                                  <label class="radio-inline">
                                                                                                  <input type="radio" name="gender" value="w">
                                                                                                  Wanita
                                                                                                  </label>

                                                                                                  @if ($errors->has('gender'))
                                                                                                  <span class="help-block">
                                                                                                         <strong>{{ $errors->first('gender') }}</strong>
                                                                                                  </span>
                                                                                                  @endif
                                                                                           </div>
                                                                                    </div>
                                                                                    <div class="form-group"><!--Tempat Lahir-->
                                                                                           <label for="kota_lahir">Tempat Lahir</label>
                                                                                           <input name="kota_lahir" list="kota_lahir" placeholder="Pilih Kota" class="form-control {{ $errors->has('kota_lahir') ? 'is-invalid':'' }}" required >
                                                                                           <datalist id="kota_lahir">
                                                                                                  {{-- <option value="">Pilih</option> --}}
                                                                                                  @foreach ($idkota as $row)
                                                                                                  <option value="{{ $row->name }}">
                                                                                                  @endforeach
                                                                                           </datalist>
                                                                                           <p class="text-danger">{{ $errors->first('kota_lahir') }}</p>
                                                                                           {{-- <input type="text" name="kota_lahir" value="{{ old('kota_lahir') }}" id="kota_lahir" class="form-control {{ $errors->has('kota_lahir') ? 'is-invalid':'' }}">
                                                                                           @if($errors->has('kota_lahir'))
                                                                                           <div class="invalid-feedback text-danger">{{ $errors->first('kota_lahir') }}</div>
                                                                                           @endif --}}
                                                                                    </div>

                                                                                    <div class="form-group"><!--Tanggal Lahir-->
                                                                                           <label for="tgl_lahir">Tanggal Lahir</label>
                                                                                           <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control {{ $errors->has('tgl_lahir') ? 'is-invalid':'' }}">
                                                                                           @if($errors->has('tgl_lahir'))
                                                                                           <div class="invalid-feedback text-danger">{{ $errors->first('tgl_lahir') }}</div>
                                                                                           @endif
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                           <label for="kd_agama">Agama</label>
                                                                                           <select name="kd_agama" id="kd_agama"
                                                                                           required class="form-control {{ $errors->has('kd_agama') ? 'is-invalid':'' }}">
                                                                                           <option value="">Pilih</option>
                                                                                           @foreach ($agama as $row)
                                                                                                  <option value="{{ $row->kd_agama }}">{{ ucfirst($row->agama) }}</option>
                                                                                           @endforeach
                                                                                           </select>
                                                                                           <p class="text-danger">{{ $errors->first('kd_agama') }}</p>
                                                                                    </div>

                                                                                    <div class="form-group {{ $errors->has('status_kawin') ? 'is-invalid':''}}"><!--STATUS-->
                                                                                           <label for="status_kawin">Status Perkawinan</label>
                                                                                           <select id="status_kawin" class="form-control" name="status_kawin">
                                                                                                  <option value="" selected>Pilih</option>
                                                                                                  <option value="bk">Belum Menikah</option>
                                                                                                  <option value="k">Menikah</option>
                                                                                                  <option value="ch">Cerai</option>
                                                                                                  <option value="cm">Janda/Duda</option>
                                                                                            </select>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                                  <label for="no_ktp">No Identitas</label>
                                                                                                  <input type="text" name="no_ktp" id="no_ktp" class="form-control {{ $errors->has('no_ktp') ? 'is-invalid':'' }}">
                                                                                                  @if($errors->has('no_ktp'))
                                                                                                  <div class="invalid-feedback text-danger">{{ $errors->first('no_ktp') }}</div>
                                                                                                  @endif
                                                                                    </div>





                                                                      </div>

                                                                      <div class="col-md-6">
                                                                                    <div class="form-group"><!--Alamat-->
                                                                                           <label for="alamat">Alamat</label>
                                                                                           <textarea name="alamat" id="alamat" cols="5" rows="4" class="form-control {{ $errors->has('alamat') ? 'is-invalid':''}}"></textarea>
                                                                                           <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                                                                    </div>

                                                                                    <div class="form-group"><!--telepon-->
                                                                                           <label for="telepon">Nomor Telepon</label>
                                                                                           <input type="text" name="telepon" id="telepon" class="form-control {{ $errors->has('telepon') ? 'is-invalid':'' }}">
                                                                                           <p class="text-danger">{{ $errors->first('telepon') }}</p>
                                                                                    </div>

                                                                                     <div class="form-group">
                                                                                           <label for="npwp">NPWP</label>
                                                                                           <input type="text" name="npwp" id="npwp" class="form-control {{ $errors->has('npwp') ? 'is-invalid':'' }}" value="000000000000000">
                                                                                           @if($errors->has('npwp'))
                                                                                                  <div class="invalid-feedback text-danger">{{ $errors->first('npwp') }}</div>
                                                                                           @endif
                                                                                    </div>

                                                                                     <div class="form-group">
                                                                                           <label for="">Foto</label>
                                                                                           <input type="file" value="b" name="foto" class="form-control">
                                                                                           <p class="text-danger">{{ $errors->first('foto') }}</p>
                                                                                    </div>

                                                                      </div>
                                                               </div>

                                                                <hr>
                                                               <h4><b> Informasi Perusahaan</b></h4>
                                                               <hr>

                                                               <div class="row">
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                    <label for="nik">NIP</label>
                                                                                    <input type="text" name="nik" id="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid':'' }}" required>
                                                                                    <p class="text-danger">{{ $errors->first('nik') }}</p>
                                                                             </div>
                                                                             <div class="form-group">
                                                                                    <label for="kd_jabatan">Jabatan</label>
                                                                                    <select name="kd_jabatan" id="kd_jabatan"
                                                                                    required class="form-control {{ $errors->has('kd_jabatan') ? 'is-invalid':'' }}">
                                                                                    <option value="">Pilih</option>
                                                                                    @foreach ($jabatan as $row)
                                                                                           <option value="{{ $row->kd_jabatan }}">{{ ucfirst($row->jabatan) }}</option>
                                                                                    @endforeach
                                                                                    </select>
                                                                                    <p class="text-danger">{{ $errors->first('kd_jabatan') }}</p>
                                                                             </div>


                                                                             <div class="form-group">
                                                                                    <label for="">Cabang</label>
                                                                                    <select name="kd_cabang" id="kd_cabang"
                                                                                    required class="form-control {{ $errors->has('kd_cabang') ? 'is-invalid':'' }}">
                                                                                    <option value="">Pilih</option>
                                                                                    @foreach ($cabang as $row)
                                                                                           <option value="{{ $row->kd_cabang }}">{{ ucfirst($row->nama_cabang) }}</option>
                                                                                    @endforeach
                                                                                    </select>
                                                                                    <p class="text-danger">{{ $errors->first('kd_cabang') }}</p>
                                                                             </div>

                                                                             <div class="form-group">
                                                                                    <label for="kd_dept">Divisi</label>
                                                                                    <select name="kd_dept" id="kd_dept"
                                                                                    required class="form-control {{ $errors->has('kd_dept') ? 'is-invalid':'' }}">
                                                                                    <option value="kd_dept">Pilih</option>
                                                                                    @foreach ($dept as $row)
                                                                                           <option value="{{ $row->kd_dept }}">{{ ucfirst($row->departemen) }}</option>
                                                                                    @endforeach
                                                                                    </select>
                                                                                    <p class="text-danger">{{ $errors->first('kd_dept') }}</p>
                                                                             </div>
                                                                             <div class="form-group">
                                                                                    <label for="kd_cc">Divisi</label>
                                                                                    <select name="kd_cc" id="kd_cc"
                                                                                    required class="form-control {{ $errors->has('kd_cc') ? 'is-invalid':'' }}">
                                                                                    <option value="">Pilih</option>
                                                                                    @foreach ($cc as $row)
                                                                                           <option value="{{ $row->kd_cc }}">{{ ucfirst($row->cost_center) }}</option>
                                                                                    @endforeach
                                                                                    </select>
                                                                                    <p class="text-danger">{{ $errors->first('kd_cc') }}</p>
                                                                             </div>

                                                                      </div>
                                                               </div>

                                                        </div>
                                                        <div class="box-footer">
                                                               <div class="form-group">
                                                                      <button  type ="submit" class="btn btn-primary">
                                                                      <i class="fa fa-send"></i> Simpan
                                                                      </button>
                                                               </div>
                                                        </div>
                                                 </form>
                                                 @slot('footer')

                                                 @endslot

                                   </div>
                            </div>
                     </div>
              </section>
       </div>
@endsection