<div class="modal fade" id="AddUnitModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="unitCrudModal"></h4>
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
    </div>
    <form id="unitForm" name="unitForm" class="form-horizontal">
    <div class="modal-body">
           <input type="hidden" name="id_unit" id="id_unit">
           <input type="hidden" name="kd_unit" id="kd_unit">
                      <!-- keterangan -->
            <div class="form-group row">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Enter Tilte" value="Oke" maxlength="50">
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
                <label for="harga_jual" class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="harga_jual" name="harga_jual" placeholder="No harga_jual"  maxlength="50">
                </div>
            </div>
             <!-- gambar -->
                        <div class="form-group row">
                <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control form-control-sm" id="gambar" name="gambar" accept="image/*" placeholder=" gambar"  maxlength="50">
                </div>
            </div>
             <!-- kode_cabang -->
             <div class="form-group row">
                <label for="kode_cabang" class="col-sm-3 col-form-label">Cabang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="kode_cabang" name="kode_cabang" placeholder="No cabang"  maxlength="50">
                </div>
            </div>
            
    </div>
    <div class="modal-footer">

             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Simpan
             </button>

    </div>
    </form>
</div>
</div>
</div>


<script>



   

  
if ($("#unitForm").length > 0) {
      $("#unitForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
       
      $.ajax({
          data: $('#unitForm').serialize(),
          url: "{{ route('unit.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#unitForm').trigger("reset");
              $('#AddUnitModal').modal('hide');
              $('#btn-save').html('Simpan');
              var oTable = $('#unit_table').dataTable();
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