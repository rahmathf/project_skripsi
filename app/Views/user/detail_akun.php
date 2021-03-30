<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Akun</h6>
        </div>
        <div class="col">
            <div class="card mb-3 my-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $auth['sampul']; ?>" alt="..." class="detail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $auth['nama']; ?></h5>
                            <h6 class="card-text">Username : <?= $auth['username']; ?></h6>
                            <h6 class="card-text">RT : <?= $auth['rt']; ?></h6>
                            <h6 class="card-text">RW : <?= $auth['rw']; ?></h6>
                            <h6 class="card-text">Level : <?= $auth['level']; ?></h6>
                            <h6 class="card-text">Saldo : <?= $auth['saldo']; ?></h6>

                            <a href="/akun/edit/<?= $auth['nama']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/akun/<?= $auth['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <button onclick="pilihTransaksi()" class="btn btn-primary">Transaksi</button>
            <a href="/akun/reset/<?= $auth['nama']; ?>" class="btn btn-secondary">Reset Password</a>
        </div>
        <br>
    </div>

</div>
<?= $this->endSection(); ?>
<?= $this->section('custom_script') ?>
<script>
    function pilihTransaksi() {
        Swal.fire({
            icon: 'question',
            title: 'Pilih Jenis Transaksi',
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: 'Setor Sampah',
            denyButtonText: 'Tarik Setoran',
            cancelButtonText: 'Batal'
        }).then((res) => {
            //kalo true setor, false tarik
            if (res.value) {
                //true
                location.href = "/transaksi/setor/<?= $auth['id'] ?>";
            } else {
                location.href = "/transaksi/tarik/<?= $auth['id'] ?>";
            }
        })
    }
</script>
<?= $this->endSection(); ?>