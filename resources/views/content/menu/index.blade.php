@extends('layouts.app')
@section('title', 'Setting')

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
              <li class="breadcrumb-item active">Menu</li>
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
              <h1>Menu Management</h1>
              </div>
              <div class="col">
              <div class="text-right">
                
                <a href="javascript:void(0)" class="btn btn-info btn-lg" id="AddMenu">Baru</a>
                </div>
                </div>
              </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-sm" width="100%" id="menu_table">
                  <thead>
                      <tr>
                      <th>ID</th>
                      <th width="5px">No.</th>
                      <th>Judul</th>
                      <th>Link</th>
                      <th>Icon</th>
                      <th>Parent</th>
                      <th width="100px">Action</th>
                      </tr>
                  </thead>
                </table>
              
              </div>
            </div>

    </section>
    <!-- /.content -->
    @include('content.menu.add')
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
  $('#menu_table').DataTable({
         processing: true,
<<<<<<< HEAD
         serverSide: true,
=======

>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        
         ajax: {
          url: "{{ route('menu.index') }}",
          type: 'GET',
         },
         columns: [
                  {data: 'id', name: 'id', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'menu_judul', name: 'menu_judul' },
                  { data: 'menu_link', name: 'menu_link' },
                  { data: 'menu_icon', name: 'menu_icon' },
                  { data: 'menu_parent', name: 'menu_parent' },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
        order: [[0, 'asc']]
      });
      
     /*  When user click add user button */
     $('#AddMenu').click(function () {
        $('#btn-save').val("create");
        $('#id').val('');
        $('#menuForm').trigger("reset");
        $('#menuCrudModal').html("Add New Menu");
        $('#menuModal').modal('show');
    });
  
   /* When click edit user */
    $('body').on('click', '.edit-menu', function () {
      var menu_id = $(this).data('id');
      console.log(menu_id);
      
      $.get("{{ route('menu.index') }}" +'/' + menu_id +'/edit', function (data){
         $('#menu_judul-error').hide();
         $('#menu_link-error').hide();
         $('#menu_icon-error').hide();
         $('#menu_parent_id-error').hide();
         $('#menuCrudModal').html("Edit Menu");
          $('#btn-save').val("edit-menu");
          $('#menuModal').modal('show');
          $('#id').val(data.id);
          $('#menu_judul').val(data.menu_judul);
          $('#menu_link').val(data.menu_link);
          $('#menu_icon').html('<option value='+data.menu_icon+'>'+data.menu_icon+'</option>');
          $('#menu_parent_id').html('<option value='+data.menu_parent_id+'>'+data.menu_parent_id+'</option>');
         
      })
   });

    
    $('body').on('click', '.delete-menu', function () {
      
      var id = $(this).data('id');
      var judul = $(this).data('judul');
      console.log(id);
      console.log(judul);
     
      Swal.fire({
        title: "Hapus "+ judul + "?",
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
                            url: "{{ route('menu.index') }}" + "/" + id,
                            success: function (data) {
                            var oTable = $('#menu_table').dataTable(); 
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