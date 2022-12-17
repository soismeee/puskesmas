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
                <label for="kode" class="col-sm-2 col-form-label">Kode Rekam medis</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="kode" name="kode" readonly>
                    <input type="text" class="form-control" id="id_rm" name="id_rm" value="<?= $rekammedis['id_rm']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d'); ?>">
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
                    <input type="text" class="form-control" value="<?= $rekammedis['nama_dokter']; ?>" readonly>
                    <input type="hidden" class="form-control" name="id_dokter" id="id_dokter" value="<?= $rekammedis['id_dokter']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $rekammedis['nama_pasien']; ?>" readonly>
                    <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="<?= $rekammedis['id_pasien']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <?php 
                        $tanggal = new DateTime($rekammedis['tanggal_lahir']);
                        $today = new DateTime('today');
                        $y = $today->diff($tanggal)->y;
                    ?>
                    <input type="text" class="form-control" id="umur" name="umur" value="<?= $y; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="<?= $rekammedis['alamat_pasien']; ?>"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerima" name="penerima" value="<?= $rekammedis['nama_pasien']; ?>">
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

    <?= $this->section('js'); ?>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "<?= site_url('resep/autocode'); ?>",
                type: "GET",
                success: function(hasil){
                    var kode = $.parseJSON(hasil);
                    $('#kode').val(kode);
                }
            });
        });
    </script>
    <?= $this->endSection(); ?>