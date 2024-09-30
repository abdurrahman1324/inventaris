<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url ('assets') ?>/img/auth/login-bg.jpg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href=""><img src="<?= base_url ('assets') ?>/src/img/brand.svg" alt=""></a>
                    </div>
                    <h3>Form Lupa Password</h3>
                    <p>Sillahkan Masukan Password Anda</p>

                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your email address"
                            name="email" value="<?= $this->uri->segment(2); ?>" readonly>
                            <i class="ik ik-mail"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control <?= form_error('newpassword') ? 'is-invalid' : ''; ?>" placeholder="Masukan password baru"
                            name="newpassword" value="<?= set_value ('newpassword'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('newpassword'); ?>
                            </div>
                            <i class="ik ik-mail"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control <?= form_error('confirmnewpassword') ? 'is-invalid' : ''; ?>"  placeholder="Ulangi password  baru"
                            name="confirmnewpassword" value="<?= set_value ('confirmnewpassword'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('confirmnewpassword'); ?>
                            </div>
                            <i class="ik ik-mail"></i>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Submit</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Are you member? <a href="<?= base_url('auth') ?>">Sing In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>