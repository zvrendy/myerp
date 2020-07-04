$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('body').toggleClass('mini-sidebar');
    });
    $("#btn-add").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/administrator/karyawan',
            data: {
                karyawan_nik: $("#frmAddKaryawan input[name=karyawan_nik]").val(),
                karyawan_nama: $("#frmAddKaryawan input[name=karyawan_nama]").val(),
                karyawan_nickname: $("#frmAddKaryawan input[name=karyawan_nickname]").val(),
                karyawan_ktp: $("#frmAddKaryawan input[name=karyawan_ktp]").val(),
                karyawan_alamatktp: $("#frmAddKaryawan textarea[name=karyawan_alamatktp]").val(),
                karyawan_gender: $("#frmAddKaryawan select[name=karyawan_gender]").val(),
                karyawan_agama: $("#frmAddKaryawan select[name=karyawan_agama]").val(),
                karyawan_statuskawin: $("#frmAddKaryawan select[name=karyawan_statuskawin]").val(),
                karyawan_jmlanak: $("#frmAddKaryawan input[name=karyawan_jmlanak]").val(),
                karyawan_kotalahir: $("#frmAddKaryawan input[name=karyawan_kotalahir]").val(),
                karyawan_tgllahir: $("#frmAddKaryawan input[name=karyawan_tgllahir]").val(),
                karyawan_alamat: $("#frmAddKaryawan input[name=karyawan_alamat]").val(),
                karyawan_kota: $("#frmAddKaryawan input[name=karyawan_kota]").val(),
                karyawan_kodepos: $("#frmAddKaryawan input[name=karyawan_kodepos]").val(),
                karyawan_email: $("#frmAddKaryawan input[name=karyawan_email]").val(),
                karyawan_telepon: $("#frmAddKaryawan input[name=karyawan_telepon]").val(),
                karyawan_npwp: $("#frmAddKaryawan input[name=karyawan_npwp]").val(),
                karyawan_cabang: $("#frmAddKaryawan select[name=karyawan_cabang]").val(),
                karyawan_jabatan: $("#frmAddKaryawan select[name=karyawan_jabatan]").val(),
                karyawan_departemen: $("#frmAddKaryawan select[name=karyawan_departemen]").val(),
                karyawan_level: $("#frmAddKaryawan select[name=karyawan_level]").val(),
                karyawan_aktif: $("#frmAddKaryawan select[name=karyawan_aktif]").val(),
                karyawan_bpjskes: $("#frmAddKaryawan input[name=karyawan_bpjskes]").val(),
                karyawan_bpjsket: $("#frmAddKaryawan input[name=karyawan_bpjsket]").val(),
                karyawan_foto: $("#frmAddKaryawan input[name=karyawan_foto]").val(),

            },
            dataType: 'json',
            success: function (data) {
                $('#frmAddKaryawan').trigger("reset");
                $("#frmAddKaryawan .close").click();
                window.location.reload();
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-task-errors').html('');
                $.each(errors.messages, function (key, value) {
                    $('#add-task-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });
    $("#btn-edit").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/karyawan/' + $("#frmEditKaryawan input[name=karyawan_id]").val(),
            data: {
                karyawan_nik: $("#frmEditKaryawan input[name=karyawan_nik]").val(),
                karyawan_nama: $("#frmEditKaryawan input[name=karyawan_nama]").val(),
            },
            dataType: 'json',
            success: function (data) {
                $('#frmEditKaryawan').trigger("reset");
                $("#frmEditKaryawan .close").click();
                window.location.reload();
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-karyawan-errors').html('');
                $.each(errors.messages, function (key, value) {
                    $('#edit-karyawan-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });
    $("#btn-delete").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '/karyawan/' + $("#frmDeleteKaryawan input[name=karyawan_id]").val(),
            dataType: 'json',
            success: function (data) {
                $("#frmDeleteKaryawan .close").click();
                window.location.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});

function FormTambahKaryawan() {
    $(document).ready(function () {
        $("#add-error-bag").hide();
        $('#tambahKaryawanModal').modal('show');
    });
}

function editKaryawanForm(karyawan_id) {
    $.ajax({
        type: 'GET',
        url: '/karyawan/' + karyawan_id,
        success: function (data) {
            $("#edit-error-bag").hide();
            $("#frmEditKaryawan input[name=karyawan_nama]").val(data.indexKaryawan.karyawan_nik);
            $("#frmEditKaryawan input[name=karyawan_id]").val(data.karyawan_nik.karyawan_nik);
            $('#editKaryawanModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function deleteKaryawanForm(karyawan_id) {
    $.ajax({
        type: 'GET',
        url: '/administrator/karyawan/' + karyawan_id,
        success: function (data) {
            // alert(data);
            $("#frmDeleteKaryawan #delete-title").html("Delete Karyawan " + data.iK.karyawan_nama + " ?");
            // $("#frmDeleteKaryawan input[name=karyawan_nik]").val(data.indexKaryawan.karyawan_nik);
            $('#deleteKaryawanModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}



$(function () {
    $("#karyawan_aktif").change(function () {
        if ($(this).val() == "K") {
            $("#karyawan_jmlanak").removeAttr("disabled");
            $("#karyawan_jmlanak").focus();
        } else {
            $("#karyawan_jmlanak").val("0");
            $("#karyawan_jmlanak").attr("disabled", "disabled");
        }
    });
});
