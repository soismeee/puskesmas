<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Daftar Rekam Medis Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;">Data Rekam Medis Pasien Klinik Dharma Mulia</h6>
            <!-- <a href="/datarm/tambahrm" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Tambah Rekam Medis</a> -->
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
                        <th scope="col">Tanggal Periksa</th>
                        <th scope="col">Id Pasien</th>
                        <th scope="col">Id Dokter</th>
                        <th scope="col">Data Subjektif</th>
                        <th scope="col">Data Objektif</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Planning</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($rekammedis as $r) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $r['tanggal_periksa']; ?></td>
                            <td><?= $r['nama_pasien']; ?></td>
                            <td><?= $r['nama_dokter']; ?></td>
                            <td><?= $r['data_subjektif']; ?></td>
                            <td><?= $r['data_objektif']; ?></td>
                            <td><?= $r['diagnosa']; ?></td>
                            <td><?= $r['planning']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <!-- <a href="/datarm/cetakrbp/<?= $r['id_pasien']; ?>" class="btn btn-md btn-success"><i class="fas fa-print" title=""></i></a> -->
                                        <?php if(session()->get('hak_akses') == "pasien") : ?>
                                            <a href="/datarm/lihatrbp/<?= $r['id_rm']; ?>" class="btn btn-md btn-primary"><i class="fas fa-file-invoice-dollar" title="lihat resep dan pembayaran"></i></a>
                                        <?php else : ?> 
                                            <!-- edit -->
                                            <a href="/datarm/tambahrbp/<?= $r['id_rm']; ?>" class="btn btn-md btn-info"><i class="fas fa-file-invoice" title="Tambah Resep dan pembayaran"></i></a>
                                            <a href="/datarm/editrm/<?= $r['id_rm']; ?>" class="btn btn-md btn-warning"><i class="fas fa-pencil-alt" title="edit rekam medis"></i></a>
                                            <!-- button hapus -->
                                            <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#deleteModal_<?= $r['id_rm'] ?>">
                                                <i class="fas fa-trash" title="hapus data rekam medis"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="hapus">
                                        <!-- Button hapus -->
                                        <div class="modal fade" id="deleteModal_<?= $r['id_rm'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/datarm/hapus/<?= $r['id_rm']; ?>" method="get">
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

<?= $this->section('js'); ?>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 3000);
    </script>
<?= $this->endSection(); ?>