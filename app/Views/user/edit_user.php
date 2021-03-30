<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h3 class="m-0 font-weight-bold text-primary">Ubah Data Akun</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="container p-2 text-center border-left-primary">
                        <img src="/img/<?= $user['sampul'] ?>" class="w-50 img-responsive img-fluid" alt="foto profil">
                    </div>
                    <div class="container mt-2 text-center">
                        <button data-toggle="modal" data-target="#uploadFoto" class="btn btn-dark"><i class="fas fa-pen"></i> Ubah Foto</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-xs-12">
                    <form action="/User/update/" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" required name="nama" placeholder="Nama Lengkap" autofocus value="<?= (old('nama')) ? old('nama') : $user['nama'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" required name="username" placeholder="Username" value="<?= (old('username')) ? old('username') : $user['username'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="rt" class="col-sm-2 col-form-label">RT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" name="rt" placeholder="RT" value="<?= (old('rt')) ? old('rt') : $user['rt'] ?>">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="rw" class="col-sm-2 col-form-label">RW</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" name="rw" placeholder="RW" value="<?= (old('rw')) ? old('rw') : $user['rw'] ?>">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block center-block">
                                Ubah Data
                            </button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="uploadFoto" class="modal modal-fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">Upload Foto Profil</div>
            <div class="modal-body">
                <div class="container mb-3 text-center">
                    <img class="img-fluid w-50 h-50" id="previewImg">
                </div>
                <form action="/User/updateFoto" enctype="multipart/form-data" method="post">
                    <?= csrf_field() ?>
                    <input type="file" id="foto" name="foto" class="form-control form-control-file">
                    <div class="mt-3 text-center form-group">
                        <button class="btn btn-success" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>