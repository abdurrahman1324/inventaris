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
                    <h3>Forgot Password</h3>
                    <p>We will send you a link to reset password.</p>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('authentication/forgot') ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Your email address"
                            name="email" value="<?= set_value ('email'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('email'); ?>
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