<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Data Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Kwintansi Pasien </h6>
            <!-- <a href="/pembayaran/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah Transaksi</a> -->
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
                        <th scope="col">Id Transaksi</th>
                        <th scope="col">Jenis Transaksi</th>
                        <th scope="col">Id Resep</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pembayaran as $n) :
                    ?>
                        <tr>
                            <th width="5%"><?= $i++; ?></th>
                            <td><?= $n['id_transaksi']; ?></td>
                            <td><?= $n['jenis_transaksi']; ?></td>
                            <td><?= $n['id_resep']; ?></td>
                            <td><?= $n['jumlah']; ?></td>
                            <td><?= $n['total']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- pembayaran -->
                                        <a href="/pembayaran/cetak/<?= $n['id_transaksi']; ?>" class="btn btn-success"><i class="fas fa-print"></i></a>

                                        <?php if(session()->get('hak_akses') != "pasien") : ?>
                                        <!-- edit -->
                                        <a href="/pembayaran/edit/<?= $n['id_transaksi']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <!-- button hapus -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $n['id_transaksi'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="hapus">

                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $n['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/pembayaran/hapus/<?= $n['id_transaksi']; ?>" method="get">
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