<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Edit Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Edit Data Dokter</h2>
    </div>

    <div class="card-body">
        <form method="post" action="/jadwaldokter/update/<?= $listdokter['id_dokter']; ?>">
            <div class="form-group row">
                <label for="id_dokter" class="col-sm-2 col-form-label">Id Dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('id_dokter')) ? 'is-invalid' : ''; ?>" id="id_dokter" name="id_dokter" autofocus value="<?= old('id_dokter'); ?> ">
                    <div id="id_dokterFeedback" class="invalid-feedback"> <?= $validation->getError('id_dokter'); ?>
                    </div>
                </div>

            </div>
            <div class="form-group row">
                <label for="nama_dokter" class="col-sm-2 col-form-label">Nama dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Masukan Nama dokter">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_dokter" class="col-sm-2 col-form-label">Alamat dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_dokter" name="alamat_dokter" placeholder="Masukan Alamat dokter">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_tlp" class="col-sm-2 col-form-label">No. Tlp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukan Nomor Telepon">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="jenis_poli">Poli Klinik</label></div>
                <div class="col-10">
                    <select name="jenis_poli" id="jenis_poli" class="form-control">
                        <option value="Umum">Poli Umum</option>
                        <option value="Gigi">Poli Gigi</option>
                        <option value="KIA/KB">Poli KIA/KB</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-2 col-form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jadwal" id="jadwal" value="option1" checked>
                    <label class="form-check-label" for="jadwal">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jadwal" id="jadwal" value="option2" checked>
                    <label class="form-check-label" for="jadwal">
                        Tidak Aktif
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/jadwaldokter" class="btn btn-danger mr-2">Kembali</a>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>