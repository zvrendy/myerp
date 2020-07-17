<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col">
          <h1>Detail Pesanan</h1>
        </div>
        <div class="col">
          <div class="text-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" id="AddDetail">
              Baru
            </button>

          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      <table class="table table-bordered table-sm compact hover" width="100%" id="detail_pesan_table">
        <thead>
          <tr>
            <th width="5px">No.</th>
            <th>Kode Trans</th>
            <th>Kode Unit/Produk</th>
            <th>qty</th>
            <th>Total</th>
            <th width="100px">Action</th>
          </tr>
        </thead>

      </table>

    </div>
  </div>


</section>
<!-- /.content -->

<!-- Modal-->
<div class="modal fade" id="AddDetailModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="produkCrudModal">Informasi Pesanan</h4>
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
          ×
        </button>
      </div>
      <form id="pesanForm" name="pesanForm" class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="id_sp_d" id="id_sp_d">
          <!-- No Dokumen -->
          <div class="form-group row">
            <label for="no_dok" class="col-sm-3 col-form-label">No dokumen</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="no_dok_2" name="no_dok" placeholder="Input Judul" maxlength="50">
            </div>
          </div>
          <!-- Kode trans -->
          <div class="form-group row">
            <label for="kode_trans" class="col-sm-3 col-form-label">Kode Trans</label>
            <div class="col-sm-6">
              <select id="kode_trans" class="custom-select custom-select-sm" name="kode_trans">
                <option value="" selected>Pilih</option>
                @foreach (App\Trans::orderBy('id_trans', 'asc')->get() as $row)
                <option value="{{ $row->id_trans }}">{{ $row->kode_trans }} - {{ $row->keterangan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!-- Kode unit -->
          <div class="form-group row">
            <label for="kd_unit" class="col-sm-3 col-form-label">kd unit</label>
            <div class="col-sm-6">
              <select id="kd_unit" class="custom-select custom-select-sm" name="kd_unit">
                <option value="" selected>Pilih</option>
                @foreach (App\unit::orderBy('id_unit', 'asc')->get() as $row)
                <option value="{{ $row->kd_unit }}">{{ $row->kd_unit }} - {{ $row->keterangan }}</option>
                @endforeach
              </select>
            </div>

          </div>
          <!-- qty-->
          <div class="form-group row">
            <label for="qty" class="col-sm-3 col-form-label">qty</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="qty" name="qty" placeholder="Input Judul" maxlength="50">
            </div>
          </div>
          <!-- total -->
          <div class="form-group row">
            <label for="total" class="col-sm-3 col-form-label">Total</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="total" name="total" placeholder="No total" maxlength="50">
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary" value="create" id="btn-save">Add
          </button>

        </div>
      </form>
    </div>
  </div>
</div>

<script>


</script>
@section('js')
<script>
  var v = 1;
  var z = $('#detail_pesan_table').DataTable();
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('#detail_pesan_table').DataTable({
      processing: true,
      serverSide: true,

      ajax: {
        url: "{{ route('PesanDetail.index') }}",
        type: 'GET',
      },
      columns: [{
          data: 'id_sp_d',
          name: 'id_sp_d',
          'visible': false
        },
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'kode_trans',
          name: 'kode_trans'
        },
        {
          data: 'kd_unit',
          name: 'kd_unit'
        },
        {
          data: 'qty',
          name: 'qty'
        },
        {
          data: 'total',
          name: 'total'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],
      order: [
        [0, 'asc']
      ]
    });
    if ($("#pesanForm").length > 0) {
      $("#pesanForm").validate({

        submitHandler: function(form) {

          var actionType = $('#btn-save').val();
          $('#btn-save').html('Sending..');

          $.ajax({
            data: $('#pesanForm').serialize(),
            url: "{{ route('PesanDetail.store') }}",
            type: "POST",
            dataType: 'json',
            success: function(data) {

              $('#pesanForm').trigger("reset");
              $('#AddDetailModal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#detail_pesan_table').DataTable();
              oTable.draw();


            },
            error: function(data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
            }
          });
        }
      })
    }
    $('#detail_pesan_table').DataTable();
    $('#addbtn').click(addrow);


  });

  $('#AddDetail').click(function() {
    var x = $("#no_dok").val();
    $('#no_dok_2').val(x);
    $('#produkForm').trigger("reset");
    $('#AddDetailModal').modal('show');
  });

  function addrow() {
    $('#detail_pesan_table').DataTable().row.add([
      $('#detail_pesan_table').DataTable().rows().count() + 1,
      $('#kode_trans').val(),
      $('#kd_unit').val(),
      $('#qty').val(),
      $('#total').val(),

      '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
    ]).draw();
    v++;
  }

  // Edit record
  $('#detail_pesan_table').on('click', 'a.editor_edit', function(e) {
    e.preventDefault();

    editor.edit($(this).closest('tr'), {
      title: 'Edit record',
      buttons: 'Update'
    });
  });

  // Delete a record
  $('#detail_pesan_table').on('click', '.editor_remove', function(e) {
    e.preventDefault();
    $('#detail_pesan_table').DataTable().row($(this).parents('tr'))
      .remove()
      .draw();
  });
</script>
@endsection