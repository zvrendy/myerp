<!DOCTYPE html>
<html>

<head>
    @include('partials.head')
</head>

<body class="hold-transition login-page">


    <div class="col-lg-4">
        <div class="login-box">
            <div class="login-logo">
                <a>
                    <h1>My</h1>ERP
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <form action="{{ route('login.final') }}" method="get">
                    @csrf
                    <div class="card-body login-card-body">

                        <!-- username -->

                        <div class="form-group input-group row mb-3 ">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-circle"></span>
                                </div>
                            </div>
                        </div>
                        <!-- username -->
                        <div class="form-group row input-group mb-3">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <!-- company -->
                        <div class="form-group row input-group mb-3">
<<<<<<< HEAD
                            <label for="company" class="col-sm-4 col-form-label">Perusahaan</label>
                            <select id="company" name="company" class="custom-select custom-select-sm">
=======
                            <label for="company" class="col-sm-4 col-form-label">Cabang</label>
                            <select id="company" name="companyproject" class="custom-select custom-select-sm">
                                {{-- @foreach($cmp as $company_id => $company)
                            <option value="{{ $company_id }}">
                                {{ $company }}
                                </option>
                                @endforeach --}}
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
                            </select>
                        </div>
                        <!-- companyproject -->
                        <div class="form-group row input-group mb-3">
<<<<<<< HEAD
                            <label for="companyproject" class="col-sm-4 col-form-label">Cabang</label>
=======
                            <label for="companyproject" class="col-sm-4 col-form-label">Perusahaan</label>
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
                            <select id="companyproject" name="companyproject" class="custom-select custom-select-sm">
                            </select>
                        </div>
                        <button type="submit" class="btn btn-login btn-block btn-success" disabled autocomplete="off">LOGIN</button>

                    </div>
                    <!-- /.login-card-body -->
                </form>
            </div>
        </div>
        <!-- /.login-box -->
    </div>


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
    <!-- <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {


            $("#password").keydown(function(e) {

                if (e.keyCode == 9) {
                    var username = $("#username").val();
                    var password = $("#password").val();
                    var token = $("meta[name='csrf-token']").attr("content");

                    if (username.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Alamat username Wajib Diisi !'
                        });

                    } else if (password.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Password Wajib Diisi !'
                        });

                    } else {

                        $.ajax({

                            url: "{{ route('login.check_login') }}",
                            type: "POST",
                            dataType: "JSON",
                            cache: false,
                            data: {
                                "username": username,
                                "password": password,
                                "_token": token
                            },

                            success: function(response) {

                                if (response.success) {

                                    Swal.fire({
                                            icon: 'success',
                                            type: 'success',
                                            title: 'Login Berhasil!',
                                            text: 'Harap tunggu',
                                            timer: 1000

                                        })
                                        .then(function() {

                                            $('#username').attr('disabled', true),
                                                $('#password').attr('disabled', true),
                                                $.ajax({
                                                    url: "{{ route('login.get_company') }}",
                                                    method: 'get',

                                                    success: function(data) {
                                                        $('#company').html(data.html);
                                                        $('.btn-login').removeAttr('disabled');
                                                    }
                                                });
                                            // $(".btn-login").click( function(){
                                            //     $.ajax({
                                            //         url: "",
                                            //         method: 'get',

                                            //         success: function(response) {
                                            //               console.log(response.success);

                                            //         }
                                            //     });
                                            //     // window.location.href = "{{ route('dashboard.index') }}";

                                            // });


                                        });

                                } else {

                                    console.log(response.success);

                                    Swal.fire({
                                        type: 'error',
                                        title: 'Login Gagal!',
                                        text: 'silahkan coba lagi!'
                                    });

                                }

                                console.log(response);

                            },

                            error: function(response) {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Opps!',
                                    text: 'server error!'
                                });

                                console.log(response);

                            }

                        });

                    }
                }
            });

        });
    </script>
    <script type="text/javascript">
        $("#company").change(function() {
            $.ajax({
<<<<<<< HEAD
                url: "{{ route('login.fetch') }}?kode_usaha=" + $(this).val(),
=======
                url: "{{ route('login.fetch') }}?company_id=" + $(this).val(),
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
                method: 'GET',
                success: function(data) {
                    $('#companyproject').html(data.html);
                }
            });
        });
    </script>
<<<<<<< HEAD

</body>

</html>
=======
    </script>
</body>

</html>
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
