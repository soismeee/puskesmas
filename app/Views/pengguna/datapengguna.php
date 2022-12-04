<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Daftar Pengguna Klinik Dharma Mulia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;">Data Pengguna Klinik Dharma Mulia</h6>
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
                        <th scope="col">Id User</th>
                        <th scope="col">Username</th>
                        <!-- <th scope="col">Password</th> -->
                        <th scope="col">Hak Akses</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pengguna as $a) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['id_user']; ?></td>
                            <td><?= $a['username']; ?></td>
                            <!-- <td><?= $a['password']; ?></td> -->
                            <td><?= $a['hak_akses']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- edit -->
                                        <a href="/datapengguna/editpengguna/<?= $a['id_user']; ?>" class="btn btn-md btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <!-- button hapus -->
                                        <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $a['id_user'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="hapus">
                                        

                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $a['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/datapengguna/hapus/<?= $a['id_user']; ?>" method="get">
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