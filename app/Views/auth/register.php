<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat akun aplikasi!</h1>
                        </div>
                        <?= $validation->listErrors(); ?>
                        <form class="user" action="/login/save" method="POST">
                            <?= csrf_field(); ?>
                            <div class="from-group">
                                <div class="col-sm-12">
                                    <h4>Form data pasien</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukan nama anda">
                            </div>
                            <div class="form-group">
                                <label for="">Nama KK</label>
                                <input type="text" class="form-control" id="nama_kk" name="nama_kk" placeholder="Masukan nama anda">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Tanggal lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal lahir">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jekel" id="jekel" class="form-control">
                                        <option disabled selected>Pilih jenis kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Poli</label>
                                <select name="nama_poli" id="nama_poli" class="form-control">
                                    <option value="Umum">Poli Umum</option>
                                    <option value="Gigi">Poli Gigi</option>
                                    <option value="KIA/KB">Poli KIA/KB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">alamat</label>
                                <textarea name="alamat_pasien" id="alamat_pasien" cols="10" rows="3" class="form-control" placeholder="Masukan alamat anda"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <h4> &nbsp;&nbsp; Form data akun</h4>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Buat username anda">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Buat password anda">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Registrasi sekarang</button>
                            <!-- <input class="btn btn-primary btn-user btn-block" type="submit" name="register" value="Buat akun sekarang"> -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/login">Sudah punya akun? Login sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>