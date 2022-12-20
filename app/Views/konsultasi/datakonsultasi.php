<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Konsultasi pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data konsultasi </h6>
            <?php if (session()->get('hak-akses') == "pasien") : ?>
                <a href="/konsultasi/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Buat konsultasi baru</a>
            <?php endif; ?>
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
                        <th width="5%">No</th>
                        <th scope="col">ID Konsul</th>
                        <?php if (session()->get('hak_akses') == "pasien") : ?>
                            <th scope="col">Nama Dokter</th>
                        <?php else : ?>
                            <th scope="col">Nama Pasien</th>
                        <?php endif; ?>
                        <th scope="col">tanggal Konsul</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($konsultasi as $k) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['id_konsultasi']; ?></td>
                            <?php if (session()->get('hak_akses') == "pasien") : ?>
                                <td><?= $k['nama_dokter']; ?></td>
                            <?php else : ?>
                                <td><?= $k['nama_pasien']; ?></td>
                            <?php endif; ?>
                            <td><?= $k['tanggal_konsul']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- detail -->
                                        <a href="/konsultasi/roomchat/<?= $k['id_konsultasi']; ?>" class="btn btn-primary"><i class="fas fa-file"></i></a>
                                        <!-- edit -->
                                        <!-- <a href="/dokter/editdokter/<?= $k['id_dokter']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> -->
                                        <!-- button hapus -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $k['id_dokter'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="hapus">
                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $k['id_dokter'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/dokter/hapus/<?= $k['id_dokter']; ?>" method="get">
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
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<?= $this->endSection(); ?>