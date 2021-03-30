<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="mb-4 text-gray-800 h3">Blank Page</h1> -->

    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Sampah</h6>
        </div>
        <div class="col">
            <a href="/sampah/create" class="my-3 btn btn-primary">Tambah Data Sampah</a>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('del')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('del'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga(Rp/Kg)</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sampah as $sh) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $sh['sampul']; ?>" alt="" class="fsampah"></td>
                            <td><?= $sh['jenis']; ?></td>
                            <td><?= $sh['harga']; ?></td>
                            <td><a href="/sampah/detail/<?= $sh['id']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>



    </div>

</div>
<?= $this->endSection(); ?>