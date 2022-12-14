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
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="<?= old('nama', $pengguna['nama']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= old('username', $pengguna['username']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan bila tidak ingin mengubah password">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Hak Akses</label>
                <div class="col-sm-10">
                    <select name="hak_akses" id="hak_akses" class="form-control">
                        <option disabled selected>Pilih hak akses</option>
                        <option <?= $pengguna['hak_akses'] == "admin" ? 'selected' : ''; ?> value="admin">Petugas</option>
                        <option <?= $pengguna['hak_akses'] == "dokter" ? 'selected' : ''; ?> value="dokter">Dokter</option>
                        <option <?= $pengguna['hak_akses'] == "pasien" ? 'selected' : ''; ?> value="pasien">Pasien</option>
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