<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Detail Pasien</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Identitas Pasien</h6>
            <a href="/pasien/print/<?= $pasien['id_pasien'] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="idPasien">ID Pasien</label>
                        <input type="text" name="id_pasien" id="idPasien" placeholder="Masukkan ID Pasien" class="form-control" value="<?= $pasien['id_pasien']; ?>" readonly>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama_pasien" placeholder="Masukkan Nama Pasien" class="form-control" value="<?= $pasien['nama_pasien'] ?>" readonly>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kk">Nama KK</label>
                        <input type="text" name="nama_kk" placeholder="Masukkan Nama Pasien" class="form-control" value="<?= $pasien['nama_kk'] ?>" readonly>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" placeholder="Masukkan Nama Pasien" class="form-control" value="<?= $pasien['tanggal_lahir'] ?>" readonly>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat_pasien" class="form-control" value="<?= $pasien['alamat_pasien']; ?>" placeholder="Masukkan Alamat Pasien" readonly>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <center>
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Rekam Medis</h6>
                </center>
            </div>
            <br>
            <div class="table-responsive m-1">
                <table class="table table-striped table-bordered">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="dataTables_length" id="datatables_length"><label>Show entries<select name="datatables_length" aria-controls="datatables" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-10 col-md-4">
                            <div id="datatables_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables"></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Tanggal Periksa</th>
                            <th>ID Dokter</th>
                            <th>Data Subjektif</th>
                            <th>Data Objektif</th>
                            <th>Diagnosa</th>
                            <th>Planning</th>
                            <!-- <th>Terapi</th>
                                    <th>Tindakan</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listRm as $i => $data) : ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= date('d-m-Y', strtotime($data['tanggal_periksa'])); ?></td>
                                <td><?= $data['id_dokter']; ?></td>
                                <td><?= $data['data_subjektif']; ?></td>
                                <td><?= $data['data_objektif']; ?></td>
                                <td><?= $data['diagnosa']; ?></td>
                                <td><?= $data['planning']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <tfoot></tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>