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
          <li class="breadcrumb-item active">Master Produk</li>
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
          <h1>Produk Management</h1>
        </div>
        <div class="col">
          <div class="text-right">

            <a href="{{ route('Produk.create') }}" class="btn btn-info btn-lg" id="AddProduk">Baru</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-sm" width="100%" id="produk_table">
        <thead>
          <tr>
            <th width="5px">No.</th>
            <th>Img</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @forelse($getProduk as $key => $produk)
          <tr>
            <td>{{$getProduk->firstItem() + $key }}</td>
            <td>{{$produk->gambar}}</td>
            <td>{{$produk->nama}}</td>
            <td align="center">{{$produk->tipe}}</td>
            <td>{{$produk->harga_jual}}</td>
            <td>

              <!-- FORM ACTION UNTUK METHOD DELETE -->
              <!-- <a class="btn btn-sm btn-success" href="{{ route('Produk.show', $produk->id_produk) }}"><i class="fa fa-eye"></i></a> -->
              <a class="btn btn-sm btn-info" href="{{ route('produk.edit', $produk->id_produk) }}"><i class="fa fa-edit"></i></a>
              <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$produk->id_produk}})" data-target="#DeleteModal" class="btn btn-sm btn-danger" data-tooltips="Hapus" placeholder="Hapus"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center">Tidak ada data</td>
          </tr>
          @endforelse
        </tbody>
      </table>

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
    $('#produk_table').DataTable({
      processing: true,
      serverSide: true,

      ajax: {
        url: "{{ route('produk.index') }}",
        type: 'GET',
      },
      columns: [{
          data: 'id_produk',
          name: 'id_produk',
          'visible': false
        },
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'gambar',
          name: 'gambar'
        },
        {
          data: 'nama',
          name: 'nama'
        },
        {
          data: 'tipe_barang',
          name: 'tipe_barang'
        },
        {
          data: 'harga_jual',
          name: 'harga_jual'
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
    $('#AddProduk').click(function() {
      $('#btn-save').val("create");
      $('#btn-save').html("Simpan");
      $('#id_produk').val('');
      $('#produkForm').trigger("reset");
      $('#produkCrudModal').html("Tambah Produk");
      $('#AddProdukModal').modal('show');
    });

    /* When click edit user */
    $('body').on('click', '.edit', function() {
      var id = $(this).data('id');
      console.log(id);

      $.get("{{ route('produk.index') }}" + '/' + id + '/edit', function(data) {
        $('#gambar-error').hide();
        $('#nama-error').hide();
        $('#tipe_barang-error').hide();
        $('#harga_id-error').hide();
        $('#produkCrudModal').html("Edit produk");
        $('#btn-save').val("edit");
        $('#AddProdukModal').modal('show');
        $('#id_produk').val(data.id_produk);
        $('#gambar').val(data.gambar);
        $('#nama').val(data.nama);
        $('#tipe_barang').val(data.tipe_barang);
        $('#kode_cabang').val(data.kode_cabang);
      })
    });


    $('body').on('click', '.delete', function() {

      var id = $(this).data('id');
      var judul = $(this).data('judul');
      console.log(id);
      console.log(judul);

      Swal.fire({
        title: "Hapus " + judul + "?",
        text: "But you will still be able to retrieve this file.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        cancelButtonText: "Tidak"
      }).then((result) => {
        // if(confirm("Are You sure want to delete !")){
        if (result.value) {
          $.ajax({
            type: "DELETE",
            url: "{{ route('produk.index') }}" + "/" + id,
            success: function(data) {
              var oTable = $('#produk_table').dataTable();
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