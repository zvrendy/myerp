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
<link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script type="text/javascript">
    /*     $(function() {
        $("#karyawan_pph21").change(function() {
            if ($(this).val() == "K") {
                $("#karyawan_jmlanak").removeAttr("disabled");
                $("#karyawan_jmlanak").focus();
            } else {
                $("#karyawan_jmlanak").val("0");
                $("#karyawan_jmlanak").attr("disabled", "disabled");
            }
        });
    }); */
    </script>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

   <!-- Sweetalert -->
   <!-- <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.css')}}"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css">

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">