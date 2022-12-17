<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Area Konsultasi
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800">Konsultasi pasien</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?= $konsultasi['id_konsultasi']; ?>
            </div>
            <div class="card-body">
                <?php foreach($chat as $c) : ?>
                <?php if(session()->get('hak_akses') == "pasien") : ?>
                    <div class="card mb-2 <?= $c["akses"] == "pasien" ? "bg-success text-white" : "bg-light" ?>">
                        <div class="card-body">
                            <h5 style="text-align: <?= $c['akses'] == "pasien" ? "right" : "left"; ?>"><?= $c['pesan']; ?></h5>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="card mb-2 <?= $c["akses"] == "dokter" ? "bg-success text-white" : "bg-light" ?>">
                        <div class="card-body">
                            <h5 style="text-align: <?= $c['akses'] == "dokter" ? "right" : "left"; ?>"><?= $c['pesan']; ?></h5>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form action="/konsultasi/kirimpesan" method="post">
                        <div class="row">
                        <input type="hidden" name="id_konsultasi" value="<?= $konsultasi['id_konsultasi']; ?>">
                            <div class="col-lg-11">
                                <textarea name="pesan" class="form-control" cols="30" rows="5" placeholder="Masukan pesna anda disini"></textarea>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>