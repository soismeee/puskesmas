<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Periksa
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data Pemeriksaan Pasien </h6>
            <?php if($button == 1) : ?>
            <a href="/periksa/tambahperiksa" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah Pasien</a>
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
                        <th width="5%" scope="col">No.Urut</th>
                        <th width="20%" scope="col">Nama Pasien</th>
                        <th width="15%" scope="col">Tanggal Periksa</th>
                        <th width="10%" scope="col">Shift</th>
                        <th width="10%" scope="col">Waktu Pendaftaran</th>
                        <th width="10%" scope="col">Jenis Poli</th>
                        <th width="10%" scope="col">Status</th>
                        <th width="10%" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($periksa as $a) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['nama_pasien']; ?></td>
                            <td><?= $a['tanggal_periksa']; ?></td>
                            <td><?= $a['shift']; ?></td>
                            <td><?= $a['waktu_daftar']; ?></td>
                            <td><?= $a['nama_poli_periksa']; ?></td>
                            <td>
                                <?php if($a['status'] == "selesai") : ?>
                                    <span class="badge badge-success">
                                        Selesai
                                    </span>    
                                <?php else : ?>
                                    <span class="badge badge-info">
                                        Proses
                                    </span>    
                                <?php endif; ?>
                            </td>
                            <?php if($a['status'] == "selesai") : ?>
                                <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- edit -->
                                        <a href="/periksa/createrm/<?= $a['id_periksa']; ?>" class="btn btn-md btn-info"><i class="fas fa-file-invoice"></i></a>
                                    </div>
                                </div>
                                </td>
                            <?php else : ?>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- edit -->
                                        <a href="/periksa/editperiksa/<?= $a['id_periksa']; ?>" class="btn btn-md btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                        <!-- button hapus -->
                                        <button type="button" class=" d-inline btn btn-md btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $a['id_periksa'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="hapus">
                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $a['id_periksa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/periksa/hapus/<?= $a['id_periksa']; ?>" method="get">
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
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>