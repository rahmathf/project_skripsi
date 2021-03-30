<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="mb-4 text-gray-800 h3">Blank Page</h1> -->

    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h3 class="m-0 font-weight-bold text-primary">Ubah Kata Sandi</h3>
        </div>
        <div class="card-body">

            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input required type="password" id="passwordLama" class="form-control form-control-user" name="passwordLama" placeholder="Password lama">
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="passwordBaru" required class="form-control form-control-user" name="passwordBaru" placeholder="Password Baru">
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Konfirmasi Sandi Baru</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input onchange="comparePass()" required type="password" id="konfirmasi" class="form-control form-control-user" name="konfirmasi" placeholder="Password Baru">
                    </div>
                    <div class="mt-2 pesanError">
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-9">

                </div>
                <div class="col-sm-3">
                    <button id="submit" type="button" onclick="cekPass()" disabled class="btn btn-primary btn-user btn-block center-block">
                        Ubah Data
                    </button>
                </div>
            </div>
            <hr>

            <!-- Styling for the area chart can be found in the
            <code>/js/demo/chart-area-demo.js</code> file. -->
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
<?= $this->section('custom_script') ?>
<script>
    $(document).ready(function() {
        $('#konfirmasi').keyup(comparePass)
        $('.input-group>input').keyup(function() {
            var empty = false;
            //cek setiap input
            $('.input-group>input').each(function() {
                if ($(this).val().length == 0) {
                    empty = true;
                }
            })
            if (empty) {
                $('#submit').attr('disabled', 'disabled');
            } else {
                $('#submit').attr('disabled', false);

            }
        })

    })

    function comparePass() {

        const newPass = $('#passwordBaru').val()
        const confirmation = $('#konfirmasi').val()
        if (newPass !== confirmation) {
            $('.pesanError').addClass('text-danger').removeClass('text-success').html('Password Tidak Sama!');
        } else
            $('.pesanError').addClass('text-success').removeClass('text-danger').html('Password Sesuai');
    }

    function cekPass() {
        const oldPass = $('#passwordLama').val()
        // cek password lama
        Swal.fire({
            title: 'Memeriksa Password lama',
            didOpen: () => {
                Swal.showLoading()
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('User/cekPass') ?>",
                    data: {
                        oldPass: oldPass
                    },
                    dataType: "text",
                    success: function(response) {
                        if (response == 'true') {
                            // Swal.close()
                            submitForm()
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'Password Lama yang Anda masukan salah!, periksa kembali password Anda!'
                            }).then($('#passwordLama').val(""))
                        }
                    }
                });
            }
        })
    }

    function submitForm() {

        const newPass = $('#passwordBaru').val()
        const confirmation = $('#konfirmasi').val()
        Swal.fire({
            title: 'Merubah Password',
            didOpen: () => {
                Swal.showLoading()
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('User/resetPass') ?>",
                    data: {
                        newPass: newPass
                    },
                    dataType: "text",
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Password Berhasil Diubah, Silahkan Login Kembali Dengan Password Baru Anda'
                        }).then((res) => {
                            if (res.isConfirmed)
                                window.location.href = "/logout"
                        })
                    }
                });
            }
        })
    }
</script>
<?= $this->endSection(); ?>