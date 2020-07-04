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
              <li class="breadcrumb-item active">Master Unit</li>
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
              <h1>Unit Management</h1>
              </div>
              <div class="col">
              <div class="text-right">
                
                <a href="javascript:void(0)" class="btn btn-info btn-lg" id="AddUnit">Baru</a>
                </div>
                </div>
              </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-sm" width="100%"id="unit_table">
                  <thead>
                      <tr>
                      <th>ID</th>
                      <th width="5px">No.</th>
                      <th>Img</th>
                      <th>Nama</th>
                      <th>Tipe</th>
                      <th>Harga</th>
                      <th width="100px">Action</th>
                      </tr>
                  </thead>
                </table>
              
              </div>
            </div>

    </section>
    <!-- /.content -->
    @include('content.unit.add')
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
  $('#unit_table').DataTable({
         processing: true,
         serverSide: true,
        
         ajax: {
          url: "{{ route('unit.index') }}",
          type: 'GET',
         },
         columns: [
                  {data: 'id_unit', name: 'id_unit', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'gambar', name: 'gambar' },
                  { data: 'nama', name: 'nama' },
                  { data: 'tipe_barang', name: 'tipe_barang' },
                  { data: 'harga_jual', name: 'harga_jual' },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
        order: [[0, 'asc']]
      });
      
     /*  When user click add user button */
     $('#AddUnit').click(function () {
        $('#btn-save').val("create");
        $('#btn-save').html("Simpan");
        $('#id_unit').val('');
        $('#unitForm').trigger("reset");
        $('#unitCrudModal').html("Tambah unit");
        $('#AddUnitModal').modal('show');
    });
  
   /* When click edit user */
    $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
      console.log(id);
      
      $.get("{{ route('unit.index') }}" +'/' + id +'/edit', function (data){
         $('#gambar-error').hide();
         $('#nama-error').hide();
         $('#tipe_barang-error').hide();
         $('#harga_id-error').hide();
         $('#unitCrudModal').html("Edit unit");
          $('#btn-save').val("edit");
          $('#AddUnitModal').modal('show');
          $('#id_unit').val(data.id_unit);
          $('#gambar').val(data.gambar);
          $('#nama').val(data.nama);
          $('#tipe_barang').val(data.tipe_barang);
          $('#kode_cabang').val(data.kode_cabang);
                  
      })
   });

    
    $('body').on('click', '.delete', function () {
      
      var id = $(this).data('id');
      
      console.log(id);
      
     
      Swal.fire({
        title: "Hapus?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Tidak"
                }).then( (result) => {
          // if(confirm("Are You sure want to delete !")){
                   if (result.value){
                      $.ajax({
                            type: "DELETE",
                            url: "{{ route('unit.index') }}" + "/" + id,
                            success: function (data) {
                            var oTable = $('#unit_table').dataTable(); 
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