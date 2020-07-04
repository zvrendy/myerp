<div class="modal fade" id="menuModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="menuCrudModal"></h4>
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
						×
					</button>
    </div>
    <form id="menuForm" name="menuForm" class="form-horizontal">
    <div class="modal-body">
           <input type="hidden" name="id" id="id">
            <div class="form-group row">
                <label for="menu_judul" class="col-sm-3 col-form-label">Menu Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="menu_judul" name="menu_judul" placeholder="Input Judul"  maxlength="50">
                </div>
            </div> 
            <div class="form-group row">
                <label for="menu_link" class="col-sm-3 col-form-label">Menu Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="menu_link" name="menu_link" placeholder="Enter Tilte" value="#" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
               <label for="menu_parent_id" class="col-sm-3 col-form-label">Parent</label>
               <div class="col-sm-6">
               <select class="custom-select custom-select-sm" id="menu_parent_id" name="menu_parent_id">
               <option value="0">Select Parent Menu</option>
               @foreach($allMenu as $key => $value)
                    <option value="{{ $key }}">{{ $value}}</option>
               @endforeach
               </select>
               </div>
            </div>
            <div class="form-group row">
               <label for="menu_icon" class="col-sm-3 col-form-label">Menu Icon</label>
                    <div class="col-sm-6">
                    <select style="font-family: FontAwesome;" class="custom-select custom-select-sm" id="menu_icon"  name="menu_icon">
                    <option selected value="">Pilih Icon</option>
                    <option value="fas fa-exchange-alt">fas fa-exchange-alt</option>
                    <option value="fas fa-folder">fas fa-folder</option>
                    <option value="fas fa-bolt">fas fa-bolt</option>
                    
                    </select>
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



   

  
if ($("#menuForm").length > 0) {
      $("#menuForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
       
      $.ajax({
          data: $('#menuForm').serialize(),
          url: "{{ route('menu.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#menuForm').trigger("reset");
              $('#menuModal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#menu_table').dataTable();
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