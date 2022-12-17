<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Dashboard
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datatables">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Periksa</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal Periksa</th>
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
                            <td><?= date('d F Y', strtotime($p['tanggal_periksa'])); ?></td>
                            <td><?= $p['nama_poli_periksa']; ?></td>
                            <td><?= $p['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>