@extends('layouts.app')
@section('title', 'Master Data')

@section('content')
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu <small>@yield('title')</small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master Trans</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
              <div class="row">
              <div class="col">
              <h1>Trans Management</h1>
              </div>
              <div class="col">
              <div class="text-right">
                
                <a href="javascript:void(0)" class="btn btn-info btn-lg" id="AddTrans">Baru</a>
                </div>
                </div>
              </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-sm" width="100%"id="trans_table">
                  <thead>
                      <tr>
                      <th>ID</th>
                      <th width="25px">No.</th>
                      <th>Kode Trans</th>
                      <th>Keterangan</th>
                      <th>Akun Debet</th>
                      <th>Akun Kredit</th>
                      <th width="100px">Action</th>
                      </tr>
                  </thead>
                </table>
              
              </div>
            </div>

    </section>
    <!-- /.content -->
    @include('content.trans.add')
@endsection

@section('js')
<script>
 var SITEURL = '{{URL::to('')}}';
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#trans_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('trans.index') }}",
        
          type: 'GET',
         },
         columns: [
                  {data: 'id_trans', name: 'id_trans', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'kode_trans', name: 'kode_trans' },
                  { data: 'keterangan', name: 'keterangan' },
                  { data: 'akun_debet', name: 'akun_debet' },
                  { data: 'akun_kredit', name: 'akun_kredit' },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
        order: [[0, 'asc']]
      });
      
     /*  When user click add user button */
     $('#AddTrans').click(function () {
        $('#btn-save').val("create-product");
        $('#id_trans').val('');
        $('#transForm').trigger("reset");
        $('#transCrudModal').html("Tambah trans");
        $('#AddTransModal').modal('show');
    });
  
  /* When click edit user */
  $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
      console.log(id);
      
      $.get("{{ route('trans.index') }}" +'/' + id +'/edit', function (data){
         $('#kode_trans-error').hide();
         $('#keterangan-error').hide();
         $('#akun_debet-error').hide();
         $('#akun_kredit-error').hide();
         $('#transCrudModal').html("Edit trans");
          $('#btn-save').val("edit");
          $('#AddTransModal').modal('show');
          $('#id_trans').val(data.id_trans);
          $('#kode_trans').val(data.kode_trans);
          $('#keterangan').val(data.keterangan);
          $('#akun_debet').val(data.akun_debet);
          $('#akun_kredit').val(data.akun_kredit);
          $('#kode_cabang').val(data.kode_cabang);
         
      })
   });

   $('body').on('click', '.delete', function () {
      
      var id = $(this).data('id');
      
      console.log(id);
      Swal.fire({
        title: "Hapus?",
                    text: "But you will still be able to retrieve this file.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Tidak"
                }).then( (result) => {

                   if (result.value){
                      $.ajax({
                            type: "DELETE",
                            url: "{{ route('trans.index') }}" + "/" + id,
                            success: function (data) {
                            var oTable = $('#trans_table').dataTable(); 
                            oTable.fnDraw(false);
                            window.location.reload();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      Swal.fire(
                        'Batal',
                        'Tidak terhapus',
                        'error'
                      )
                    }
                });
    }); 
    
});

</script>
@endsection