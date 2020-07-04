<!-- Delete Task Modal Form HTML -->
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
	<div class="modal-dialog">
		<form action="{{ route('karyawan.destroy', $iK->karyawan_nik) }}"  method="post">
			<div class="modal-content">
					<div class="modal-header bg-danger">
						<h4 class="modal-title" id="delete-title" name="title">
							Delete Karyawan
						</h4>
						<button aria-hidden="true" class="close" data-dismiss="modal" type="button">
							×
						</button>
					</div>
					<div class="modal-body">
						@csrf
						@method('DELETE')
						
						<p class="text-center">Hapus Data Karyawan ?</p>
						<h4 class="text-center">[{{$iK->karyawan_nik}}] - {{$iK->karyawan_nama}}</h4>
					</div>
					<div class="modal-footer">
						<center>
							<button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
							<button class="btn btn-danger">Hapus</button>
						</center>
					</div>
			</div>
		</form>
	</div>
</div>

@section('js')
<script type="text/javascript">
$(document).ready(function(){
	var id = id;
     function deleteData(id)
     {
         var url = '{{ route('karyawan.destroy', ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
});
</script>
   
@endsection