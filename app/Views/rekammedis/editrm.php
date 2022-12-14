<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Edit Data Rekam Medis
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Edit Data Rekam Medis</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/datarm/updaterm/<?= $rekammedis['id_rm']; ?>">

            <div class="form-group row">
                <label for="tgl" class="col-sm-2 col-form-label">Nomor RM </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_rm" name="id_rm" value="<?= $rekammedis['id_rm']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-2 col-form-label">Tanggal Periksa </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_periksa" name="tanggal_periksa" placeholder="Masukan Nomor Tanggal Periksa" value="<?= $rekammedis['tanggal_periksa']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Id pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $rekammedis['nama_pasien']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_dokter" class="col-sm-2 col-form-label">Id Dokter</label>
                <div class="col-sm-10">
                    <select name="id_dokter" id="id_dokter" class="form-control">
                        <option disabled>Pilih Dokter</option>
                        <?php foreach ($listDokter as $dokter) : ?>
                            <option <?= $rekammedis['id_dokter'] == $dokter['id_dokter'] ? "selected" : ''; ?> value="<?= $dokter['id_dokter']; ?>"><?= $dokter['nama_dokter']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="id_dokter" name="id_dokter" placeholder="" value="<?= $rekammedis['id_dokter']; ?>"> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="data_subjektif" class="col-sm-2 col-form-label">Data Subjektif</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="data_subjektif" name="data_subjektif"><?= $rekammedis['data_subjektif']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="data_objektif" class="col-sm-2 col-form-label">Data Objektif</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="data_objektif" name="data_objektif"><?= $rekammedis['data_objektif']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="<?= $rekammedis['diagnosa']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="planning" class="col-sm-2 col-form-label">Planning</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="planning" name="planning" value="<?= $rekammedis['planning']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/datarm" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>