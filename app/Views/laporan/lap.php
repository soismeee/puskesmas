<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Klinik Dharma Mulia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;">KLINIK DHARMA MULIA</h6>
            <h4 style="color: #00f;">LAPORAN PELAYANAN RAWAT JALAN</h4>
        </div>
    </div>
    <!-- flasdata dengan alert -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="col-lg-12 mb-3">
            <form action="/laporan/bulan" method="post">
                <div class="row">
                    <div class="col-4">
                        <input type="month" name="bulan" class="form-control">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Print Laporan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datatables">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Periksa</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Poli</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($periksa as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['id_periksa']; ?></td>
                            <td><?= $p['nama_pasien']; ?></td>
                            <td><?= $p['tanggal_periksa']; ?></td>
                            <td><?= $p['nama_poli_periksa']; ?></td>
                            <td><?= $p['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>