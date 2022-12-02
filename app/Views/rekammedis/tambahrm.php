<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Tambah Data Rekam Medis
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah Rekam Medis</h2>
    </div>
    <div class="card-body">


        <form method="post" action="/datarm/simpan">
            <div class="form-group row">
                <label for="tanggal_periksa" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_periksa" name="tanggal_periksa">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Id Pasien</label>
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
                <label for="id_dokter" class="col-sm-2 col-form-label">Id Dokter </label>
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
                <label for="data_subjektif" class="col-sm-2 col-form-label">Data Subjektif</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="data_subjektif" name="data_subjektif" placeholder=""></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="data_objektif" class="col-sm-2 col-form-label">Data Objektif</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="data_objektif" name="data_objektif"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="planning" class="col-sm-2 col-form-label">Planning</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="planning" name="planning" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/datarm" class="btn btn-danger mr-2">Kembali</a>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
    </div>


    <?= $this->endSection(); ?>