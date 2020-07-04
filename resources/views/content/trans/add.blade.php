<div class="modal fade" id="AddTransModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="transCrudModal"></h4>
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                ×
                            </button>
            </div>
            <form id="transForm" name="transForm" class="form-horizontal">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="hidden" name="id_trans" id="id_trans">
                        <!-- kode_trans -->
                        <div class="form-group row">
                            <label for="kode_trans" class="col-sm-3 col-form-label">kode_trans</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-sm" id="kode_trans" name="kode_trans" placeholder="Masukkan kode_trans"maxlength="50">
                            </div>
                        </div>
                        <!-- keterangan -->
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="No keterangan"  maxlength="50">
                            </div>
                        </div> 
                        <!-- akun_debet -->
                        <div class="form-group row">
                            <label for="akun_debet" class="col-sm-3 col-form-label">akun_debet</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-sm" id="akun_debet" name="akun_debet" placeholder="No akun_debet"  maxlength="50">
                            </div>
                        </div>
                        <!-- akun_kredit -->
                        <div class="form-group row">
                            <label for="akun_kredit" class="col-sm-3 col-form-label">akun_kredit</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-sm" id="akun_kredit" name="akun_kredit" placeholder="No akun_kredit"  maxlength="50">
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



   

  
if ($("#transForm").length > 0) {
      $("#transForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
       
      $.ajax({
          data: $('#transForm').serialize(),
          url: "{{ route('trans.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#transForm').trigger("reset");
              $('#AddTransModal').modal('hide');
              $('#btn-save').html('Simpan');
              var oTable = $('#trans_table').dataTable();
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