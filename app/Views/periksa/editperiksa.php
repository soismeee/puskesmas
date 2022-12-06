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
                    <input type="text" class="form-control" id="id_periksa" name="id_periksa" placeholder="Masukan Nama Pasien" value="<?= $periksa['id_periksa']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Id Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $periksa['nama_pasien']; ?>" readonly>
                    <input type="hidden" id="id_pasien" name="id_pasien" value="<?= $periksa['id_pasien']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="shift">Tanggal Periksa</label></div>
                <div class="col-10">
                    <input type="datetime-local" class="form-control" id="tanggal_periksa" value="<?= $periksa['tanggal_periksa']; ?>" name="tanggal_periksa">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="shift">Shift / Jam Kerja</label></div>
                <div class="col-10">
                    <select name="shift" id="shift" class="form-control">
                        <option <?= $periksa['shift'] == "Pagi" ? 'selected' : '' ?> value="Pagi">Pagi</option>
                        <option <?= $periksa['shift'] == "Siang" ? 'selected' : '' ?> value="Siang">Siang</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="shift">Waktu Pendaftaran</label></div>
                <div class="col-10">
                    <input type="datetime-local" class="form-control" id="waktu_daftar" value="<?= $periksa['tanggal_periksa']; ?>" name="waktu_daftar">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="nama_poli_periksa">Poli Klinik</label></div>
                <div class="col-10">
                    <select name="nama_poli_periksa" id="nama_poli_periksa" class="form-control">
                        <option <?= $periksa['nama_poli_periksa'] == "Umum" ? 'selected' : '' ?> value="Umum">Poli Umum</option>
                        <option <?= $periksa['nama_poli_periksa'] == "Gigi" ? 'selected' : '' ?> value="Gigi">Poli Gigi</option>
                        <option <?= $periksa['nama_poli_periksa'] == "KIA/KB" ? 'selected' : '' ?> value="KIA/KB">Poli KIA/KB</option>
                    </select>
                </div>
            </div>
            <?php if(session()->get('hak_akses') == "admin") : ?>
            <hr />
            <h4>Jika sudah melakukan pemeriksaan, ganti status menjadi selesai</h4>
            <div class="form-group row">
                <div class="col-2"><label for="status">Status periksa</label></div>
                <div class="col-10">
                    <select name="status" id="status" class="form-control">
                        <option <?= $periksa['status'] == "proses" ? 'selected' : '' ?> value="proses">Proses</option>
                        <option <?= $periksa['status'] == "selesai" ? 'selected' : '' ?> value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            <?php if(session()->get('hak_akses') == "dokter") : ?>
            <hr />
            <h4>Jika sudah melakukan pemeriksaan, ganti status menjadi selesai</h4>
            <div class="form-group row">
                <div class="col-2"><label for="status">Status periksa</label></div>
                <div class="col-10">
                    <select name="status" id="status" class="form-control">
                        <option <?= $periksa['status'] == "proses" ? 'selected' : '' ?> value="proses">Proses</option>
                        <option <?= $periksa['status'] == "selesai" ? 'selected' : '' ?> value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>
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