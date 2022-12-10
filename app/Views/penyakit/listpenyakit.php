<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Daftar penyakit
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data penyakit </h6>
            <a href="/penyakit/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah penyakit</a>
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
                        <th>No</th>
                        <th>ID Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Keterangan Penyakit</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($listpenyakit as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['id_penyakit']; ?></td>
                            <td><?= $p['nama_penyakit']; ?></td>
                            <td><?= $p['ket_penyakit']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- edit -->
                                        <a href="/penyakit/editpenyakit/<?= $p['id_penyakit']; ?>" class="btn btn-md btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                        <!-- button hapus -->
                                        <a href="#" class=" d-inline btn btn-md btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $p['id_penyakit'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <div class="hapus">
                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $p['id_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/penyakit/hapus/<?= $p['id_penyakit']; ?>" method="get">
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Ingin Menggapus Data?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
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

<?= $this->section('js'); ?>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 3000);
    </script>
<?= $this->endSection(); ?>