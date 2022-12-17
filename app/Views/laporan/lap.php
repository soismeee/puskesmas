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
                        <th scope="col">Diagnosa Penyakit</th>
                        <th scope="col">Jumlah kasus</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($listpenyakit as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['nama_penyakit']; ?></td>
                            <td><?= $p['jml_kasus']; ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>