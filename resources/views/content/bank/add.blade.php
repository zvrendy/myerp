<div class="modal fade" id="bankModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="bankCrudModal"></h4>
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
    </div>
    <form id="bankForm" name="bankForm" class="form-horizontal">
    <div class="modal-body">
           <input type="hidden" name="id_bank" id="id_bank">
            <div class="form-group row">
                <label for="kode_bank" class="col-sm-3 col-form-label">Kode Bank</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="kode_bank" name="kode_bank" placeholder="Kode Bank"  maxlength="50">
                </div>
            </div> 
            <div class="form-group row">
                <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="#" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
               <label for="akun_debet" class="col-sm-3 col-form-label">Akun Debet</label>
               <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="akun_debet" name="akun_debet" placeholder="Akun Debet" value="#" maxlength="50">
                </div>
            </div>
            <div class="form-group row">
               <label for="kode_cabang" class="col-sm-3 col-form-label">Kode Cabang</label>
               <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="kode_cabang" name="kode_cabang" placeholder="Enter Tilte" value="#" maxlength="50">
                </div>
            </div>
            
    </div>
    <div class="modal-footer">

             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>

    </div>
    </form>
</div>
</div>
</div>


<script>



   

  
if ($("#bankForm").length > 0) {
      $("#bankForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
       
      $.ajax({
          data: $('#bankForm').serialize(),
          url: "{{ route('bank.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#bankForm').trigger("reset");
              $('#bankModal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#bank_table').dataTable();
              oTable.fnDraw(false);
              window.location.reload();
               
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>