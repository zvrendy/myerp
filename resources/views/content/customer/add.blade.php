@extends('layouts.app')
@section('title', 'Customer')
@section('content')


<div class="content-header">

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Customer</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}"> Customer</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>

</div>
<!--End Header Content-->

<section class="content">
    <form action="{{ route('customer.store') }}" method="post" name="customerForm" class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-xl">

                @slot('title')

                @endslot

                @if ($errors->any()) <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div> @endif
                <input type="hidden" name="id_cust" id="id_cust">
                <!-- nama -->
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan Nama" maxlength="50">
                    </div>
                </div>
                <!-- ktp -->
                <div class="form-group row">
                    <label for="ktp" class="col-sm-3 col-form-label">KTP</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="ktp" name="ktp" placeholder="No KTP" maxlength="16">
                    </div>
                </div>
                <!-- npwp -->
                <div class="form-group row">
                    <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="npwp" name="npwp" placeholder="No NPWP" maxlength="20">
                    </div>
                </div>
                <!-- tipe -->
                <div class="form-group row">
                    <label for="tipe" class="col-sm-3 col-form-label">tipe</label>
                    <div class="col-sm-4">

                        <select id="tipe" class="custom-select custom-select-sm" name="tipe">
                            <option value="" selected>Pilih Tipe</option>
                            <option value="customer">Customer</option>
                            <option value="supplier">Supplier</option>
                        </select>
                    </div>
                </div>
                <!--Alamat-->
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="alamat">Alamat</label>
                    <div class=" col-sm-9">
                        <textarea type="text" name="alamat" id="alamat" class="form-control form-control-sm" rows="4" cols="50"></textarea>
                    </div>
                </div>
                <!-- kontak_person -->
                <div class="form-group row">
                    <label for="kontak_person" class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="kontak_person" name="kontak_person" placeholder="No kontak_person" maxlength="50">
                    </div>
                </div>
            </div>
            <div class="col">
                <!-- nama_dagang -->
                <div class="form-group row">
                    <label for="nama_dagang" class="col-sm-3 col-form-label">Nama Dagang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="nama_dagang" name="nama_dagang" placeholder="Masukkan Nama Dagang" maxlength="50">
                    </div>
                </div>
                <!--Alamat-->
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="alamat_dagang">Alamat Dagang</label>
                    <div class=" col-sm-9">
                        <textarea type="text" name="alamat_dagang" id="alamat_dagang" class="form-control form-control-sm" rows="4" cols="50"></textarea>
                    </div>
                </div>
                <!-- telp -->
                <div class="form-group row">
                    <label for="telp" class="col-sm-3 col-form-label">Telp</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="telp" name="telp" placeholder="No telp" maxlength="50">
                    </div>
                </div>
                <!-- fax -->
                <div class="form-group row">
                    <label for="fax" class="col-sm-3 col-form-label">Fax</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="fax" name="fax" placeholder="No fax" maxlength="50">
                    </div>
                </div>
                <!-- kode_cabang -->
                <div class="form-group row">
                    <!-- <label for="kode_cabang" class="col-sm-3 col-form-label">Cabang</label> -->
                    <div class="col-sm-6">
                        <input type="hidden" value="4" class="form-control form-control-sm" id="kode_cabang" name="kode_cabang" placeholder="No cabang" maxlength="50">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Simpan
            </button>

        </div>
    </form>



</section>
@endsection

@section('js')
<script>
    $('#npwp').inputmask({
        mask: '99.999.999.9-999.999',
        removeMaskOnSubmit: true,
        definitions: {
            A: {
                validator: "[0-9]"
            },
        },
    });
</script>

@endsection