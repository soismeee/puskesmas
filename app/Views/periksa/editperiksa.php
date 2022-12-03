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

        <form method="post" action="/periksa/update/<?= $periksa['id_periksa']; ?>">
            <div class="form-group row">
                <label for="id_periksa" class="col-sm-2 col-form-label">Id Periksa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_periksa" name="id_periksa" placeholder="Masukan Nama Pasien" value="<?= $periksa['id_periksa']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Id Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_pasien" name="id_pasien" placeholder="Masukan Nama Pasien" value="<?= $periksa['id_pasien']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="shift">Tanggal Periksa</label></div>
                <div class="col-10">
                    <input type="datetime-local" class="form-control" id="tanggal_periksa" name="tanggal_periksa">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="shift">Shift / Jam Kerja</label></div>
                <div class="col-10">
                    <select name="shift" id="shift" class="form-control">
                        <option value="Pagi">Pagi</option>
                        <option value="Siang">Siang</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="shift">Waktu Pendaftaran</label></div>
                <div class="col-10">
                    <input type="datetime-local" class="form-control" id="waktu_daftar" name="waktu_daftar">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="nama_poli">Poli Klinik</label></div>
                <div class="col-10">
                    <select name="nama_poli" id="nama_poli" class="form-control">
                        <option value="Umum">Poli Umum</option>
                        <option value="Gigi">Poli Gigi</option>
                        <option value="KIA/KB">Poli KIA/KB</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/periksa" class="btn btn-warning">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>