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
          <li class="breadcrumb-item active">Master Supplier</li>
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
          <h1>Supplier Management</h1>
        </div>
        <div class="col">
          <h1>{{ App\Supplier::where('kode_cabang', session()->get('cabang'))->count() }} Orang</h1>
        </div>
        <div class="col">
          <div class="text-right">
            <a href="{{ route('Supplier.create') }}" class="btn btn-info btn-lg" id="AddCustomer">Baru</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-sm" width="100%" id="supplier_table">
        <thead>
          <tr>

            <th width="25px">No.</th>
            <th>Nama</th>
            <th>KTP</th>
            <th>NPWP</th>
            <th>ALAMAT</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @forelse($getSupplier as $key => $supplier)
          <tr>
            <td>{{$getSupplier->firstItem() + $key }}</td>
            <td>{{$supplier->nama}}</td>
            <td>{{$supplier->ktp}}</td>
            <td align="center">{{$supplier->npwp}}</td>
            <td>{{$supplier->alamat}}</td>
            <td>

              <!-- FORM ACTION UNTUK METHOD DELETE -->
              <!-- <a class="btn btn-sm btn-success" href="{{ route('Supplier.show', $supplier->id_supp) }}"><i class="fa fa-eye"></i></a> -->
              <form action="{{ url('/Supplier/' . $supplier->id_supp) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE" class="form-control">
                <a href="{{ route('supplier.edit', $supplier->id_supp) }}" class="btn btn-warning btn-sm fa fa-edit"></a>
                <button class="btn btn-danger btn-sm" data-tooltips="Hapus" placeholder="Hapus" onclick="return confirm('Hapus?')"><i class="fa fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center">Tidak ada data</td>
          </tr>
          @endforelse
        </tbody>
      </table>
      {{ $getSupplier->links() }}
    </div>
  </div>

</section>
<!-- /.content -->

@endsection

@section('js')
<script>
  var SITEURL = '{{URL::to('
  ')}}';
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('#supplier_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('supplier.index') }}",

        type: 'GET',
      },
      columns: [{
          data: 'id_supp',
          name: 'id_supp',
          'visible': false
        },
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'nama',
          name: 'nama'
        },
        {
          data: 'ktp',
          name: 'ktp'
        },
        {
          data: 'npwp',
          name: 'npwp'
        },
        {
          data: 'alamat',
          name: 'alamat'
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

    /*  When user click add user button */
    $('#AddSupplier').click(function() {
      $('#btn-save').val("create-product");
      $('#id_supp').val('');
      $('#supplierForm').trigger("reset");
      $('#supplierCrudModal').html("Tambah Supplier");
      $('#AddSupplierModal').modal('show');
    });

    /* When click edit user */
    $('body').on('click', '.edit', function() {
      var cust_id = $(this).data('id');
      console.log(cust_id);

      $.get("{{ route('supplier.index') }}" + '/' + cust_id + '/edit', function(data) {
        $('#nama-error').hide();
        $('#ktp-error').hide();
        $('#npwp-error').hide();
        $('#alamat-error').hide();
        $('#supplierCrudModal').html("Edit Supplier");
        $('#btn-save').val("edit");
        $('#AddSupplierModal').modal('show');
        $('#id_supp').val(data.id_supp);
        $('#nama').val(data.nama);
        $('#ktp').val(data.ktp);
        $('#npwp').val(data.npwp);
        $('#alamat').val(data.alamat);
        $('#tipe').val(data.tipe);
        $('#kontak_person').val(data.kontak_person);
        $('#telp').val(data.telp);
        $('#fax').val(data.fax);
        $('#kode_cabang').val(data.kode_cabang);

      })
    });

    $('body').on('click', '.delete', function() {

      var cust_id = $(this).data('id');

      console.log(cust_id);
      Swal.fire({
        title: "Hapus?",
        text: "But you will still be able to retrieve this file.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        cancelButtonText: "Tidak"
      }).then((result) => {

        if (result.value) {
          $.ajax({
            type: "DELETE",
            url: "{{ route('supplier.index') }}" + "/" + cust_id,
            success: function(data) {
              var oTable = $('#supplier_table').dataTable();
              oTable.fnDraw(false);
              window.location.reload();
            },
            error: function(data) {
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