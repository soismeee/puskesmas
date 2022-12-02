<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Edit Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Edit Pasien</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/Pasien/update/<?= $listpasien['id_pasien']; ?>">
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Id Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('id_pasien')) ? 'is-invalid' : ''; ?>" id="id_pasien" name="id_pasien" autofocus value="<?= old('id_pasien', $listpasien['id_pasien']); ?> ">
                    <div id="id_pasienFeedback" class="invalid-feedback"> <?= $validation->getError('id_pasien'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= old('nama_pasien', $listpasien['nama_pasien']); ?>" placeholder="Masukan Nama Pasien">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="jekel">Jenis Kelamin</label></div>
                <div class="col-10">
                    <select name="jekel" id="jekel" class="form-control">
                        <option disabled selected>Pilih Jenis kelamin</option>
                        <option value="Laki-laki" <?= $listpasien['jekel'] == "Laki-laki" ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="Perempuan" <?= $listpasien['jekel'] == "Perempuan" ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" value="<?= old('tanggal_lahir', $listpasien['tanggal_lahir']); ?>" name="tanggal_lahir" placeholder="Masukan Nama Pasien">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_kk" class="col-sm-2 col-form-label">Nama KK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kk" value="<?= old('nama_kk', $listpasien['nama_kk']); ?>" name="nama_kk" placeholder="Masukan Nama Pasien">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat Pasien</label>
                <div class="col-sm-10">
                    <input type="alamat_pasien" class="form-control" id="alamat_pasien" value="<?= old('alamat_pasien', $listpasien['alamat_pasien']); ?>" name="alamat_pasien" placeholder="Masukan Alamat Pasien">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="nama_poli">Poli Klinik</label></div>
                <div class="col-10">
                    <select name="nama_poli" id="nama_poli" class="form-control">
                        <option value="Umum" <?= $listpasien['nama_poli'] == "Umum" ? 'selected' : ''; ?>>Poli Umum</option>
                        <option value="Gigi" <?= $listpasien['nama_poli'] == "Gigi" ? 'selected' : ''; ?>>Poli Gigi</option>
                        <option value="KIA/KB" <?= $listpasien['nama_poli'] == "KIA/KB" ? 'selected' : ''; ?>>Poli KIA/KB</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/pasien" class="btn btn-danger">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>