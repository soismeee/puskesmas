<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <label class="fs-5 fw-bold">Rekam Medis Pasien</label>
                </div>
                <div class="card-body">

                    <form method="post" action="/pasien/laporan">
                        <div class="row mb-3">
                            <label for="tanggalawal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="tanggalawal" name="tanggalawal">
                            </div>
                            <label for="tanggalakhir" class="col-sm-2 col-form-label">s/d</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="tanggalakhir" name="tanggalakhir">
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value=Cetak>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>