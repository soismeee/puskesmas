<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Tambah data penyakit
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah data penyakit</h2>
    </div>
    <div class="card-body">

        <form method="post" action="/datapengguna/simpan">
            <div class="form-group row">
                <label for="nama_penyakit" class="col-sm-2 col-form-label">Nama penyakit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea name="ket_penyakit" class="form-control" id="" cols="10" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/datapengguna" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>