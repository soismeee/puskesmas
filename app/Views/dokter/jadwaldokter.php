<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Jadwal Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Jadwal Dokter </h6>
            <a href="/jadwaldokter/tambahdokter" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah Dokter</a>
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
                        <th scope="col">Id Dokter</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No.Tlp</th>
                        <th scope="col">Jenis Poli</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dokter as $j) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $j['id_dokter']; ?></td>
                            <td><?= $j['nama_dokter']; ?></td>
                            <td><?= $j['alamat_dokter']; ?></td>
                            <td><?= $j['no_tlp']; ?></td>
                            <td><?= $j['jenis_poli']; ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <p><?= $j['status']; ?></p>
                                    <!-- <p><?= $j['status'] == date('l') ? 'Aktif' : 'Tidak Aktif' ?></p> -->

                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">

                                    <!-- edit -->
                                    <a href="/jadwaldokter/detaildokter/<?= $j['id_dokter']; ?>" class="btn btn-primary btn-circle sm m-2"><i class="fas fa-file"></i></a>
                                    <!-- edit -->
                                    <a href="/jadwaldokter/editdokter/<?= $j['id_dokter']; ?>" class="btn btn-warning sm m-2"><i class="fas fa-pencil-alt"></i></a>


                                    <!-- Button hapus -->
                                    <div class="hapus">
                                        <!-- button hapus -->
                                        <button type="button" class=" d-inline btn btn-danger sm m-2" data-toggle="modal" data-target="#deleteModal_<?= $j['id_dokter'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $j['id_dokter'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/jadwaldokter/hapus/<?= $j['id_dokter']; ?>" method="get">
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