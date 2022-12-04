<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Tambah Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah Pasien</h2>
    </div>
    <div class="card-body">

        <!-- menampilkan validasi -->
        <?= $validation->listErrors(); ?>

        <form method="post" action="/Pasien/simpan">
            <!-- <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Id Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('id_pasien')) ? 'is-invalid' : ''; ?>" id="id_pasien" name="id_pasien" autofocus value="<?= old('id_pasien'); ?> ">
                        <div id="id_pasienFeedback" class="invalid-feedback"> <?= $validation->getError('id_pasien'); ?>
                    </div>
                </div>
            </div> -->
            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukan Nama Pasien">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="jekel">Jenis Kelamin</label></div>
                <div class="col-10">
                    <select name="jekel" id="jekel" class="form-control">
                        <option disabled selected>Pilih Jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Nama Pasien">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_kk" class="col-sm-2 col-form-label">Nama KK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kk" name="nama_kk" placeholder="Masukan Nama Pasien">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat Pasien</label>
                <div class="col-sm-10">
                    <input type="alamat_pasien" class="form-control" id="alamat_pasien" name="alamat_pasien" placeholder="Masukan Alamat Pasien">
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
                        <a href="/pasien" class="btn btn-danger mr-2">Kembali</a>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
    </div>


    <?= $this->endSection(); ?>