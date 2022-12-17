<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Edit Pemeriksaan Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Edit Data Pemeriksaan Pasien</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/resep/update/<?= $resep['kode']; ?>">
            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $resep['kode']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $resep['tanggal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="resep" class="col-sm-2 col-form-label">Resep</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="resep" name="resep" value="<?= $resep['resep']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_dokter" class="col-sm-2 col-form-label">Nama Dokter </label>
                <div class="col-sm-10">
                    <select name="id_dokter" id="id_dokter" class="form-control">
                        <option value="" selected disabled>Pilih Dokter</option>
                        <?php foreach ($listDokter as $dokter) : ?>
                            <option <?= $resep['id_dokter'] == $dokter['id_dokter'] ? "selected" : ""; ?> value="<?= $dokter['id_dokter']; ?>"><?= $dokter['nama_dokter']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                    <select name="id_pasien" id="id_pasien" class="form-control">
                        <option value="" selected disabled>Pilih Pasien</option>
                        <?php foreach ($listPasien as $pasien) : ?>
                            <option <?= $resep['id_pasien'] == $pasien['id_pasien'] ? "selected" : ""; ?> value="<?= $pasien['id_pasien']; ?>"><?= $pasien['nama_pasien']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?= $resep['umur']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="<?= $resep['alamat_pasien']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerima" name="penerima" value="<?= $resep['penerima']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/resep" class="btn btn-warning">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>