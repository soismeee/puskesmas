<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Daftar Resep Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;">Data Resep Pasien Klinik Dharma Mulia</h6>
            <a href="/resep/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah Resep</a>
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
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Resep</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($Resep as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['kode']; ?></td>
                            <td><?= $p['tanggal']; ?></td>
                            <td><?= $p['resep']; ?></td>
                            <td><?= $p['id_dokter']; ?></td>
                            <td><?= $p['id_pasien']; ?></td>
                            <td><?= $p['umur']; ?></td>
                            <td><?= $p['alamat_pasien']; ?></td>
                            <td><?= $p['penerima']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- edit -->
                                        <a href="/resep/edit/<?= $p['kode']; ?>" class="btn btn-md btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <!-- button hapus -->
                                        <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $p['kode'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="hapus">
                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $p['kode'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/resep/hapus/<?= $p['kode']; ?>" method="get">
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