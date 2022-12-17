<?= $this->extend('home/main'); ?>

<?= $this->section('title'); ?>
Kontak
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Kontak</h2>
                <ul>
                    <li> <a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Kontak</li>
                </ul>
            </div>
        </div>
    </div>
    


    <div style="margin-top:0px;" class="row no-margin">

        <iframe style="width:100%" src="https://www.google.com/maps/embed?dir/-6.9388324,109.5897243/2JH4%2BJ5W,+Depok,+Ketitang+Kidul,+Kec.+Bojong,+Kabupaten+Pekalongan,+Jawa+Tengah+51156+@-6.970881,109.605460/@-6.9548514,109.5275517,12z/data=!3m1!4b1!4m10!4m9!1m1!4e1!1m5!1m1!1s0x2e702057e38ecae5:0xd1b8bc7eee64e945!2m2!1d109.6054986!2d-6.9708861!3e9"  height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


    </div>

    <div class="row contact-rooo no-margin">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div style="margin:50px" class="serv">
                        <h2 style="margin-top:10px;">Alamat</h2>
                        Klinik Dharma Mulia beralamat di<br>
                        Depok, Ketitang Kidul, Kec. Bojong,<br>
                        Pekalongan, Jawa Tengah 51156, Indonesia<br>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>
