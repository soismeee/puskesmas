<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Jadwal Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data Jadwal Dokter </h6>
            <!-- <a href="/daftardokter/tambahdokter" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah dokter</a> -->
        </div>
    </div>
    <!-- flasdata dengan alert -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
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
                            <td>
                                <div class="d-flex justify-content-center">

                                    <!-- detail -->
                                    <a href="/dokter/detaildokter/<?= $jadwal['id_dokter']; ?>" class="btn btn-primary sm m-2"><i class="fas fa-file"></i></a>

                                    <!-- edit -->
                                    <a href="/dokter/editdokter/<?= $jadwal['id_dokter']; ?>" class="btn btn-warning sm m-2"><i class="fas fa-pencil-alt"></i></a>

                                    <div class="hapus">
                                        <!-- button hapus -->
                                        <button type="button" class=" d-inline btn btn-danger sm m-2" data-toggle="modal" data-target="#deleteModal_<?= $jadwal['id_dokter'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $jadwal['id_dokter'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/jadwaldokter/hapus/<?= $jadwal['id_dokter']; ?>" method="get">
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Ingin Menggapus Data?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-warning">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>