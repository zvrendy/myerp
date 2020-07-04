<div class="modal fade" id="AddProdukModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="produkCrudModal"></h4>
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
    </div>
    <form id="produkForm" name="produkForm" class="form-horizontal">
    <div class="modal-body">
           <input type="hidden" name="id_produk" id="id_produk">
           <!-- nama-->
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Produk Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Input Judul"  maxlength="50">
                </div>
            </div> 
            <!-- qty -->
            <div class="form-group row">
                <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="qty" name="qty" placeholder="Enter Tilte" value="#" maxlength="50">
                </div>
            </div>
            <!-- hpp -->
            <div class="form-group row">
                <label for="hpp" class="col-sm-3 col-form-label">hpp</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="hpp" name="hpp" placeholder="No hpp"  maxlength="50">
                </div>
            </div>
            <!-- harga_jual -->
            <div class="form-group row">
                <label for="harga_jual" class="col-sm-3 col-form-label">harga_jual</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="harga_jual" name="harga_jual" placeholder="No harga_jual"  maxlength="50">
                </div>
            </div>
                        <!-- tipe_barang -->
                        <div class="form-group row">
                <label for="tipe_barang" class="col-sm-3 col-form-label">tipe_barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="tipe_barang" name="tipe_barang" placeholder="No tipe_barang"  maxlength="50">
                </div>
            </div>
                        <!-- gambar -->
                        <div class="form-group row">
                <label for="gambar" class="col-sm-3 col-form-label">gambar</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control form-control-sm" id="gambar" name="gambar" accept="image/*" placeholder=" gambar"  maxlength="50">
                </div>
            </div>
            
    </div>
    <div class="modal-footer">

             <button type="submit" class="btn btn-primary" id="btn-save" value="create">
             </button>

    </div>
    </form>
</div>
</div>
</div>


<script>



   

  
if ($("#produkForm").length > 0) {
      $("#produkForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
       
      $.ajax({
          data: $('#produkForm').serialize(),
          url: "{{ route('produk.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#produkForm').trigger("reset");
              $('#AddProdukModal').modal('hide');
              $('#btn-save').html('Simpan');
              var oTable = $('#produk_table').dataTable();
              oTable.fnDraw(false);
              window.location.reload();
               
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Simpan');
          }
      });
    }
  })
}
</script>