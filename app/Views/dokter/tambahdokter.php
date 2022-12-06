<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Tambah jadwal Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah jadwal Dokter</h2>
    </div>
    <div class="card-body">

        <!-- menampilkan validasi -->
        <?= $validation->listErrors(); ?>

        <form action="/dokter/simpan" method="post">
            <?= csrf_field(); ?>
            <!-- <div class="form-group row">
                <label for="id_dokter" class="col-sm-2 col-form-label">Id Dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('id_dokter')) ? 'is-invalid' : ''; ?>" id="id_dokter" name="id_dokter" autofocus value="<?= old('id_dokter'); ?> ">
                    <div id="id_dokterFeedback" class="invalid-feedback"> <?= $validation->getError('id_dokter'); ?>
                    </div>
                </div>
            </div> -->
            <div class="form-group row">
                <label for="nama_dokter" class="col-sm-2 col-form-label">Nama dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= old('nama_dokter'); ?>" placeholder="Masukan Nama dokter">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_dokter" class="col-sm-2 col-form-label">Alamat dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_dokter" name="alamat_dokter" value="<?= old('alamat_dokter'); ?>" placeholder="Masukan Alamat dokter">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_tlp" class="col-sm-2 col-form-label">No. Tlp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= old('no_tlp'); ?>" placeholder="Masukan Nomor Telepon">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="jenis_poli">Poli Klinik</label></div>
                <div class="col-10">
                    <select name="jenis_poli" id="jenis_poli" class="form-control">
                        <option <?= old('jenis_poli') == "Umum" ? 'selected' : ''; ?> value="Umum">Poli Umum</option>
                        <option <?= old('jenis_poli') == "Gigi" ? 'selected' : ''; ?> value="Gigi">Poli Gigi</option>
                        <option <?= old('jenis_poli') == "KIA/KB" ? 'selected' : ''; ?> value="KIA/KB">Poli KIA/KB</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>" placeholder="Masukan Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="aktif" checked>
                            <label class="form-check-label" for="status">
                                Aktif
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="non-aktif" checked>
                            <label class="form-check-label" for="status">
                                Tidak Aktif
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/dokter" class="btn btn-danger mr-2">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
    </div>


    <?= $this->endSection(); ?>