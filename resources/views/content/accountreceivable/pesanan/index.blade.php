@extends('layouts.app')
@section('title', 'Account Receivable')

@section('content')
<<<<<<< HEAD

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
          <li class="breadcrumb-item active">Account Receivable</li>
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
          <h1>AR Pesanan</h1>
        </div>
        <div class="col">
          <div class="text-right">

            <a href="{{ route('accountreceivablepesanan.create') }}" class="btn btn-info btn-lg" id="Add">Baru</a>
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
      <table class="table table-bordered table-sm compact hover" width="100%">
        <thead>
          <tr>
            <th width="5px">No.</th>
            <th>No Invoice</th>
            <th>Nama Customer</th>
            <th>Tgl Invoice</th>
            <th>Jumlah</th>
            <th width="125px">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @forelse($getARPesananHdr as $key => $accountreceivablepesanan)
          <tr>
            <td>{{$getARPesananHdr->firstItem() + $key }}</td>
            <td>{{$accountreceivablepesanan->no_dok}}</td>
            <td>{{$accountreceivablepesanan->customer->nama}}</td>
            <td>{{$accountreceivablepesanan->tgl_dok}}</td>
            <td align="right">{{$accountreceivablepesanan->tot_amt}}</td>
            <td>

              <!-- FORM ACTION UNTUK METHOD DELETE -->
              <a class="btn btn-sm btn-success" href="{{ route('AccountReceivablePesanan.show', $accountreceivablepesanan->id_sp_h) }}"><i class="fa fa-eye"></i></a>
              <a class="btn btn-sm btn-info" href="{{ route('accountreceivablepesanan.edit', $accountreceivablepesanan->id_sp_h) }}"><i class="fa fa-edit"></i></a>
              <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$accountreceivablepesanan->id_cust}})" data-target="#DeleteModal" class="btn btn-sm btn-danger" data-tooltips="Hapus" placeholder="Hapus"><i class="fa fa-trash"></i></a>

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

=======
 
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
              <li class="breadcrumb-item active">Account Receivable</li>
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
              <h1>AR Pesanan</h1>
              </div>
              <div class="col">
              <div class="text-right">
                
                <a href="javascript:void(0)" class="btn btn-info btn-lg" id="Add">Baru</a>
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
                <table class="table table-bordered table-sm" width="100%"id="bank_table">
                  <thead>
                      <tr>
                      <th>ID</th>
                      <th width="5px">No.</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Akun</th>
                      <th>Cabang</th>
                      <th width="100px">Action</th>
                      </tr>
                  </thead>
                </table>
              
              </div>
            </div>
          
          @include('content.accountreceivable.pesanan.detail')
    </section>
    <!-- /.content -->
    @include('content.accountreceivable.pesanan.add')
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
@endsection

@section('js')
<script>
<<<<<<< HEAD
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('#ARPesanan_table').DataTable({
      processing: true,
      serverSide: true,

      ajax: {
        url: "{{ route('accountreceivablepesanan.index') }}",
        type: 'GET',
      },
      columns: [{
          data: 'id_sp_h',
          name: 'id_sp_h',
          'visible': false
        },
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'no_dok',
          name: 'no_dok'
        },
        {
          data: 'id_cust',
          name: 'id_cust'
        },
        {
          data: 'tgl_dok',
          name: 'tgl_dok'
        },
        {
          data: 'tot_amt',
          name: 'tot_amt'
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


    /* When click edit user */
    $('body').on('click', '.edit', function() {
      var bank_id = $(this).data('id');
      console.log(bank_id);

      $.get("{{ route('accountreceivablepesanan.index') }}" + '/' + bank_id + '/edit', function(data) {
        $('#no_dok-error').hide();
        $('#id_cust-error').hide();
        $('#tgl_dok-error').hide();
        $('#tot_amt_id-error').hide();
        $('#bankCrudModal').html("Edit Bank");
        $('#btn-save').val("edit");
        $('#bankModal').modal('show');
        $('#id_sp_h').val(data.id_sp_h);
        $('#no_dok').val(data.no_dok);
        $('#id_cust').val(data.id_cust);
        $('#tgl_dok').val(data.tgl_dok);
        $('#tot_amt').val(data.tot_amt);

      })
    });


    $('body').on('click', '.delete', function() {

      var bank_id = $(this).data('id');


      Swal.fire({
        title: "Hapus?",

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
            url: "{{ route('accountreceivablepesanan.index') }}" + "/" + bank_id,
            success: function(data) {
              var oTable = $('#ARPesanan_table').dataTable();
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
=======
 var SITEURL = '{{URL::to('')}}';
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#bank_table').DataTable({
         processing: true,
         serverSide: true,
        
         ajax: {
          url: "{{ route('bank.index') }}",
          type: 'GET',
         },
         columns: [
                  {data: 'id_bank', name: 'id_bank', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'kode_bank', name: 'kode_bank' },
                  { data: 'nama_bank', name: 'nama_bank' },
                  { data: 'akun_debet', name: 'akun_debet' },
                  { data: 'kode_cabang', name: 'kode_cabang' },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
        order: [[0, 'asc']]
      });
      
     /*  When user click add user button */
     $('#Add').click(function () {
        $('#btn-save').val("create");
        $('#id_bank').val('');
        $('#bankForm').trigger("reset");
        $('#bankCrudModal').html("Add New Bank");
        $('#bankModal').modal('show');
    });
  
   /* When click edit user */
    $('body').on('click', '.edit', function () {
      var bank_id = $(this).data('id');
      console.log(bank_id);
      
      $.get("{{ route('bank.index') }}" +'/' + bank_id +'/edit', function (data){
         $('#kode_bank-error').hide();
         $('#nama_bank-error').hide();
         $('#akun_debet-error').hide();
         $('#kode_cabang_id-error').hide();
         $('#bankCrudModal').html("Edit Bank");
          $('#btn-save').val("edit");
          $('#bankModal').modal('show');
          $('#id_bank').val(data.id_bank);
          $('#kode_bank').val(data.kode_bank);
          $('#nama_bank').val(data.nama_bank);
          $('#akun_debet').val(data.akun_debet);
          $('#kode_cabang').val(data.kode_cabang);
         
      })
   });

    
    $('body').on('click', '.delete', function () {
      
      var bank_id = $(this).data('id');
      
      
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
                            url: "{{ route('bank.index') }}" + "/" + bank_id,
                            success: function (data) {
                            var oTable = $('#bank_table').dataTable(); 
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

>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
</script>
@endsection