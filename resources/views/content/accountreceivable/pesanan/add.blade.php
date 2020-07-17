<<<<<<< HEAD
@extends('layouts.app')
@section('title', 'Account Receivable')

@section('content')

<div class="content-header">

       <div class="row mb-2">
              <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Tambah Pesanan</h1>
              </div>
              <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('accountreceivablepesanan.index') }}"> Account Receivable</a></li>
                            <li class="breadcrumb-item active">Add</li>
                     </ol>
              </div>
       </div>

</div>
<!--End Header Content-->

<section class="content">

       <div class="row">
              <div class="col-xl">

                     @slot('title')

                     @endslot

                     @if ($errors->any()) <div class="alert alert-danger">
                            <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                     </div> @endif
                     <form action="{{ route('accountreceivablepesanan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="box-body">

                                   <h4><b>Informasi Pesanan</b></h4>
                                   <hr>
                                   <div class="row">
                                          <div class="col">
                                                 <!-- no dokumen -->
                                                 <div class="form-group row">
                                                        <label for="no_dok" class="col-sm-3 col-form-label">No Dokumen</label>
                                                        <div class="col-sm-6">
                                                               <input type="text" class="form-control form-control-sm" id="no_dok" name="no_dok" placeholder="No Dokumen" maxlength="50" value="{{ old('no_dok') }}">
                                                        </div>
                                                 </div>
                                                 <!-- customer -->
                                                 <div class="form-group row">
                                                        <label for="id_cust" class="col-sm-3 col-form-label">Nama Customer</label>
                                                        <div class="col-sm-6">
                                                               <select id="id_cust" class="custom-select custom-select-sm" name="id_cust">
                                                                      <option value="" selected>Pilih</option>
                                                                      @foreach ($customer as $row)
                                                                      <option value="{{ $row->id_cust }}">{{ $row->nama }}</option>
                                                                      @endforeach
                                                               </select>

                                                        </div>
                                                 </div>
                                                 <!--Tanggal Dokumen-->
                                                 <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Tgl Dokumen</label>
                                                        <div class="col-sm-4">
                                                               <input type="date" name="tgl_dok" class="form-control form-control-sm" data-date-format="yyyy/mm/dd" value="1987-02-22">
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="col">
                                                 <!--Total Amt-->
                                                 <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Total Nilai</label>
                                                        <div class="col-sm-4">
                                                               <input type="text" name="tot_amt" class="form-control form-control-sm" value="0">
                                                        </div>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                            <div class="box-footer">
                                   <div class="form-group">
                                          <button type="submit" class="btn btn-primary">
                                                 <i class="fa fa-send"></i> Simpan
                                          </button>
                                   </div>
                            </div>
                            @slot('footer')
                            a
                            @endslot
                     </form>


              </div>
       </div>

</section>

@endsection
=======
<div class="modal fade" id="bankModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="bankCrudModal"></h4>
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
    </div>
    <form id="bankForm" name="bankForm" class="form-horizontal">
    <div class="modal-body">
           <input type="hidden" name="id_bank" id="id_bank">
            <div class="form-group row">
                <label for="kode_bank" class="col-sm-3 col-form-label">Kode Bank</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="kode_bank" name="kode_bank" placeholder="Kode Bank"  maxlength="50">
                </div>
            </div> 
            <div class="form-group row">
                <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="#" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
               <label for="akun_debet" class="col-sm-3 col-form-label">Akun Debet</label>
               <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="akun_debet" name="akun_debet" placeholder="Akun Debet" value="#" maxlength="50">
                </div>
            </div>
            <div class="form-group row">
               <label for="kode_cabang" class="col-sm-3 col-form-label">Kode Cabang</label>
               <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="kode_cabang" name="kode_cabang" placeholder="Enter Tilte" value="#" maxlength="50">
                </div>
            </div>
            
    </div>
    <div class="modal-footer">

             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>

    </div>
    </form>
</div>
</div>
</div>


<script>



   

  
if ($("#bankForm").length > 0) {
      $("#bankForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
       
      $.ajax({
          data: $('#bankForm').serialize(),
          url: "{{ route('bank.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#bankForm').trigger("reset");
              $('#bankModal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#bank_table').dataTable();
              oTable.fnDraw(false);
              window.location.reload();
               
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
