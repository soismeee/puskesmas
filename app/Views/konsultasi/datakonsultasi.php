<?= $this->extend('templates/main'); ?>

<?= $this->section('title'); ?>
Daftar penyakit
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 style="color: #00f;"> Data penyakit </h6>
            <a href="/konsultasi/tambah" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus"></i>Buat konsultasi baru</a>
        </div>
    </div>
    <!-- flasdata dengan alert -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <h1>KONSULTASI</h1>
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