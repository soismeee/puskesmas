<?= $this->extend('home/main'); ?>

<?= $this->section('title'); ?>
Pelayanan
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>Pelayanan</h2>
            <ul>
                <li> <a href="/home"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> Pelayanan</li>
            </ul>
        </div>
    </div>
</div>
  
<section class="services container-fluid pt-5">
    <div class="container">
        <div class="row section-title">
            <h5>Pelayanan di Klinik Dharma Mulia :</h5>
        </div>
        <div class="servic-row row">
            <div class="servic-col col-md-4">
                <div class="servcover">
                    <img src="<?= base_url() ?>/assets2/images/umum.png" alt="">
                    <h4>Poli Umum</h4>
                    <p>Jadwal Praktek</p>
                    <p>dr.Reviana Dewinta Lestari</p>
                    <p>- Pagi pukul: 06:00 sampai 15:00 .</p>
                    <hr>
                    <p>dr.Siti Zumaroch</p>
                    <p>- Siang pukul 15:00 sampai 21:00 .</p>
                </div>
            </div>
            <div class="servic-col col-md-4">
                <div class="servcover">
                    <img src="<?= base_url() ?>/assets2/images/gigii.jpg" alt="image" height="250" width="250">
                    <h4>Poli Gigi</h4>
                    <p>Jadwal Praktek</p>
                    <p>drg.Elly Ardina Putri.</p>
                    <p>- Siang pukul 16:00 sampai 21:00 .</p>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="servic-col col-md-4">
                <div class="servcover">
                    <img src="<?= base_url() ?>/assets2/images/dokteranak.png" alt="image" height="230" width="230">
                    <h4>Poli KIA/KB</h4>
                    <p>Jadwal Praktek</p>
                    <p>dr.Reviana Dewinta Lestari</p>
                    <p>- Pagi pukul: 06:00 sampai 15:00 .</p>
                    <hr>
                    <p>dr.Siti Zumaroch</p>
                    <p>- Siang pukul 15:00 sampai 21:00 .</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>