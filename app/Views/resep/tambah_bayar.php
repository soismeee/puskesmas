<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
    <?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h2><?= $title; ?></h2>
    </div>
    <div class="card-body">

        <!-- menampilkan validasi -->
        <?= $validation->listErrors(); ?>

        <form method="post" action="/pembayaran/simpan">
            <div class="form-group row">
                <label for="id_transaksi" class="col-sm-2 col-form-label">Id Transaksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_resep" class="col-sm-2 col-form-label">Id Resep</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_resep" name="id_resep" value="<?= $resep['kode']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_transaksi" class="col-sm-2 col-form-label">Jenis Transaksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="jumlah" class="form-control" id="jumlah" name="jumlah" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="total" class="form-control" id="total" name="total" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/pembayaran" class="btn btn-danger mr-2">Kembali</a>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
    </div>
    <?= $this->endSection(); ?>

    <?= $this->section('js'); ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "<?= site_url('pembayaran/autocode'); ?>",
                type: "GET",
                success: function(hasil) {
                    var kode = $.parseJSON(hasil);
                    $('#id_transaksi').val(kode);
                }
            });
        });
    </script>
    <?= $this->endSection(); ?>