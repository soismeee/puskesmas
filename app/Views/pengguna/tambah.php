<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Edit Data Pengguna
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah Data Pengguna</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/datapengguna/simpan">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Hak Akses</label>
                <div class="col-sm-10">
                    <select name="hak_akses" id="hak_akses" class="form-control">
                        <option disabled selected>Pilih hak akses</option>
                        <option value="admin">Petugas</option>
                        <option value="dokter">Dokter</option>
                        <option value="pasien">Pasien</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/datapengguna" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>