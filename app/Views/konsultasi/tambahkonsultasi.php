<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Tambah konsultasi
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2>Tambah konsultasi</h2>
    </div>
    <div class="card-body">

        <!-- menampilkan validasi -->
        <?= $validation->listErrors(); ?>

        <form method="post" action="/Konsultasi/simpan">
            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-2 col-form-label">Kode Konsultasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_konsultasi" name="id_konsultasi" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="id_dokter">Pilih dokter</label></div>
                <div class="col-10">
                    <select name="id_dokter" id="id_dokter" class="form-control">
                        <option disabled selected>Pilih dokter</option>
                        <?php foreach($dokter as $d) : ?>
                            <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"><label for="id_penyakit">Konsul Penyakit</label></div>
                <div class="col-10">
                    <select name="id_penyakit" id="id_penyakit" class="form-control">
                        <option disabled selected>Pilih penyakit</option>
                        <?php foreach($penyakit as $p) : ?>
                            <option value="<?= $p['id_penyakit']; ?>"><?= $p['nama_penyakit']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_konsul" class="col-sm-2 col-form-label">Tanggal Konsultasi</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_konsul" name="tanggal_konsul" value="<?= date('Y-m-d'); ?>">
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

    <?= $this->section('js'); ?>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "<?= site_url('konsultasi/autocode'); ?>",
                type: "GET",
                success: function(hasil){
                    var kode = $.parseJSON(hasil);
                    $('#id_konsultasi').val(kode);
                }
            });
        });
    </script>
    <?= $this->endSection(); ?>