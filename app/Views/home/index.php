<?= $this->extend('home/main'); ?>

<?= $this->section('title'); ?>
Halaman Utama
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="container-fluid  about-coo">
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h4>Selamat Datang Di Klinik Dharma Mulia</h4>
            </div>
        </div>
    </div>
    <section class="container-fluid  about-coo">
        <div class="container">
            <div class="row about-row">
                <div class="col-md-6 about-img">
                    <img src="<?= base_url() ?>/assets2/images/klinik.jpg" alt="">
                </div>
                <div class="col-md-6 about-text">
                    <h5>Latar Belakang</h5>
                    <p>Pembangunan kesehatan nasional bertujuan untuk mewujudkan derajat kesehatan yang optimal tercapainya kemampuan untuk hidup sehat bagi setiap penduduk agar dapat mewujudkan derajat kesehatan masyarakat yang optimal. Didalam melaksanakan pembangunan kesehatan tersebut keikutsertaan masyarakat swasta dalam berbagai upaya kesehatan semakin meningkat. Oleh karena itu Klinik Dharma Mulia ingin berpartisipasi dalam bidang pelayanan kesehatan untuk meningkatkan pelayanan kesehatan paripurna dan turut aktif dalam melaksanakan fungsi sosial sehingga tercapainya tujuan pembangunan kesehatan di kabupaten Pekalongan.</p>
                    <h5>Maksud dan Tujuan</h5>
                    <p>Klinik Dharma Mulia akan selalu berupaya meningkatkan kualitas sumber daya manusia (SDM) yang intelektual tinggi dan beretika baik. Hal itu dilakukan untuk memberi kepuasan yang maksimal kepada pasien dan keluarga pasien</p>
                    <h5>Motto</h5>
                    <p>Melayani adalah ibadah kami</p>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection(); ?>