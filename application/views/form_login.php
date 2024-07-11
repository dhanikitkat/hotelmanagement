<style>
    .login {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
        background-size: cover;
        background-position: center;
    }

    .login-heading {
        font-weight: 300;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js">
<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4" style="font-weight: 600;">Ani Hotel & Resort In Magelang</h3>

                            <!-- Sign In Form -->
                            <?php echo $this->session->flashdata('pesan') ?>
                            <form method="post" action="<?php echo base_url('auth/login') ?>" class="user">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" autocomplete="off">
                                    <label for="floatingInput">Username</label>
                                    <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" autocomplete="off">
                                    <label for="floatingPassword">Password</label>
                                    <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                        Remember password
                                    </label>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/forgot_password') ?>">Forgot password?</a>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="d-block text-center mt-2 small" href="<?php echo base_url('registrasi/index') ?>">Doesn't have an account? Register</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>