<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Aplikasi Klinik!</h1>
                                </div>
                                <form class="user" action="<?= site_url('login/auth'); ?>" method="POST">
                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Gagal!</strong> <?= session()->getFlashdata('error'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" id="username" aria-describedby="username" value="<?= session()->getFlashdata('username'); ?>" placeholder="Masukan username anda">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Masukan password anda">
                                    </div>
                                    <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Login">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= site_url('login/register'); ?>">Buat akun baru!</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>