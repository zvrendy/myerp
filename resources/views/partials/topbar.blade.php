<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
  <!-- Right navbar links -->

  <ul class="navbar-nav ml-auto">
    <li class="navbar-item">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Go!
      </button>

    </li>
    <!-- Account Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-th-large"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <div class="dropdown-header text-center">
          <strong>Account</strong>
        </div>
        <div class="divider"></div>
        <a class="dropdown-item" href="#">
          <i class="fa fa-shield"></i> Lock Account
        </a>
        <a class="dropdown-item" href="{{ url('login') }}">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a class="dropdown-item" href="#" onclick="event.preventDefault();
                document.getElementById('logout').submit();">
          <i class="fa fa-lock"></i> Logout
        </a>

        <form id="logout" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Tujuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.change') }}" method="get">
          <!-- company -->
          <div class="form-group row input-group mb-3">
            <label for="company" class="col-sm-4 col-form-label">Perusahaan</label>
            <select id="company" name="company" class="custom-select custom-select-sm">
              <option value="">Pilih Perusahaan</option>
              @foreach(App\Perusahaan::get() as $row)
              <option value="{{ $row->kode_usaha }}" selected="selected">{{ $row->nama_usaha }}</option>
              @endforeach
            </select>
          </div>
          <!-- companyproject -->
          <div class="form-group row input-group mb-3">
            <label for="companyproject" class="col-sm-4 col-form-label">Cabang</label>
            <select id="companyproject" name="companyproject" class="custom-select custom-select-sm">
              <option value="">Pilih Cabang</option>
              @foreach(App\Cabang::where('kode_usaha', Session::get('perusahaan'))->get() as $row)
              <option value="{{ $row->kode_cabang }}">{{ $row->kode_cabang }} - {{ $row->nama_usaha }}</option>
              @endforeach
            </select>
          </div>
      </div>
      @csrf
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Go !</button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('js')
<script type="text/javascript">
  $("#company").change(function() {
    $.ajax({
      url: "{{ route('login.fetch') }}?kode_usaha=" + $(this).val(),
      method: 'GET',
      success: function(data) {
        $('#companyproject').html(data.html);
      }
    });
  });
</script>
@endsection