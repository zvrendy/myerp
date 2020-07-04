<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('partials.head')
   
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini">
    <div class="wrapper">
			
            @include('partials.topbar')
            @include('partials.sidebar')
            
            <div class="content-wrapper">
                
                @yield('content')
            </div>
            @include('partials.footer')
	</div>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- dataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/karyawan.js')}}"></script>
    <!-- <script type="text/javascript"  src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- Sweetalert -->
    <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

	@yield('js')
</body>
</html>
