<meta charset="utf-8">

<title>
    @yield('title') | @lang('backend.judul')
</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/png" href="{{ asset('fav.png')}}">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Font Awesome Icons -->
<!-- <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<!-- Theme style -->
<!-- <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- Sweetalert -->
<!-- <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.css')}}"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css">


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- dataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>
<!-- <script src="{{ asset('lte/dist/js/adminlte.min.js')}}"></script> -->
<script type="text/javascript" src="{{asset('assets/js/karyawan.js')}}"></script>
<!-- <script type="text/javascript"  src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<!-- Sweetalert -->
<!-- <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
