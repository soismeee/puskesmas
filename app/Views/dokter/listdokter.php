<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Jadwal Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data Dokter </h6>
            <a href="/dokter/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah dokter</a>
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
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Jenis Poli</th>
                        <th scope="col">Status</th>
                        <th width="10%" scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dokter as $d) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['nama_dokter']; ?></td>
                            <td><?= $d['alamat_dokter']; ?></td>
                            <td><?= $d['no_tlp']; ?></td>
                            <td><?= $d['jenis_poli']; ?></td>
                            <td><?= $d['status']; ?></td>

                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- detail -->
                                        <!-- <a href="/dokter/detail/<?= $d['id_dokter']; ?>" class="btn btn-primary"><i class="fas fa-file"></i></a> -->

                                        <!-- edit -->
                                        <a href="/dokter/editdokter/<?= $d['id_dokter']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        
                                        <!-- button hapus -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $d['id_dokter'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="hapus">

                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $d['id_dokter'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/dokter/hapus/<?= $d['id_dokter']; ?>" method="get">
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