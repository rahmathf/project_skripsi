<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="mb-4 text-gray-800 h3">Blank Page</h1> -->

    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="mb-3 card border-left-danger" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="container">
                            <img src="/img/<?= $user['sampul']; ?>" alt="..." class="detail img-fluid">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title"><?= $user['username'] ?></h3>
                            <h6 class="card-text">Nama : <?= $user['nama']; ?></h6>
                            <h6 class="card-text">Level : <div class="badge badge-primary"><?= $user['level']; ?></div>
                            </h6>
                            <h6 class="card-text">Saldo : <?= $user['saldo'] ?></h6>
                            <a href="/user/edit" class="btn btn-success">Edit Profile</a>
                            <a href="/user/reset" class="btn btn-danger">Ubah Sandi</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>