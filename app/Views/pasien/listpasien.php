<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Daftar Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data Pasien </h6>
            <a href="/pasien/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah Pasien</a>
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
                        <th width="5%" scope="col">No</th>
                        <th width="10%" scope="col">No.Index</th>
                        <th width="20%" scope="col">Nama</th>
                        <th width="10%" scope="col">Tanggal Lahir</th>
                        <th width="10%" scope="col">Jekel</th>
                        <th width="25%" scope="col">Alamat</th>
                        <th width="10%" scope="col">Poli</th>
                        <th width="10%" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($listpasien as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['id_pasien']; ?></td>
                            <td><?= $p['nama_pasien']; ?></td>
                            <td><?= $p['tanggal_lahir']; ?></td>
                            <td><?= $p['jekel']; ?></td>
                            <td><?= $p['alamat_pasien']; ?></td>
                            <td><?= $p['nama_poli']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- detail -->
                                        <!-- <a href="/pasien/detail/<?= $p['id_pasien']; ?>" class="btn btn-md btn-info"><i class="fas fa-file"></i></a> -->

                                        <!-- edit -->
                                        <a href="/pasien/editpasien/<?= $p['id_pasien']; ?>" class="btn btn-md btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                        <!-- button hapus -->
                                        <a href="#" class=" d-inline btn btn-md btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $p['id_pasien'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <div class="hapus">
                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $p['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/pasien/hapus/<?= $p['id_pasien']; ?>" method="get">
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