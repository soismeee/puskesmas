<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Edit Data Pengguna
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Edit Data Pengguna</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/datapengguna/updatepengguna/<?= $pengguna['id_user']; ?>">
            <div class="form-group row">
                <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_user" name="id_user" placeholder="" value="<?= $pengguna['id_user']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= $pengguna['username']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?= $pengguna['password']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/datapengguna" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>