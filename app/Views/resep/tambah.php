<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Tambah Resep Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah Resep Pasien</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/resep/simpan">
            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode" name="kode">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
            </div>
            <div class="form-group row">
                <label for="resep" class="col-sm-2 col-form-label">Resep</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="resep" name="resep">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_dokter" class="col-sm-2 col-form-label">Nama Dokter </label>
                <div class="col-sm-10">
                    <select name="id_dokter" id="id_dokter" class="form-control">
                        <option value="" selected disabled>Pilih Dokter</option>
                        <?php foreach ($listDokter as $dokter) : ?>
                            <option value="<?= $dokter['id_dokter']; ?>"><?= $dokter['nama_dokter']; ?></option>
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
                            <option value="<?= $pasien['id_pasien']; ?>"><?= $pasien['nama_pasien']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="id_pasien" name="id_pasien" placeholder="Masukan Id Pasien"> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="umur" name="umur" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerima" name="penerima" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/resep" class="btn btn-danger mr-2">Kembali</a>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
    </div>


    <?= $this->endSection(); ?>