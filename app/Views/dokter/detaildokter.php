<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Jadwal Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Jadwal Dokter </h6>
        </div>
    </div>

    <!-- flasdata dengan alert -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="nama">Nama Dokter</label>
                <input type="text" class="form-control" value="<?= $dokter['nama_dokter']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="jns_poli">Jenis Poli</label>
                <input type="text" class="form-control" value="<?= $dokter['jenis_poli']; ?>" readonly>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datatables">
                <thead>
                    <tr>
                        <th scope="col">No.Urut</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($listJadwal as $jadwal) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $jadwal['jadwal_dokter']; ?></td>
                            <td><?= $jadwal['jam']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>