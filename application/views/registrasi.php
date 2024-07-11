<style>
    body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .card-img-left {
        width: 45%;
        /* Link to your background image using in the property below! */
        background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
        background-size: cover;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js">

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h3 class="login-heading mb-4" style="font-weight: 600;">Ani Hotel & Resort In Magelang</h3>
                        <h5 class="card-title text-center mb-5 fw-light fs-5" style="font-weight: 500;">Register</h5>

                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url() . 'registrasi/index'; ?>" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputFullname" placeholder="Full Name" name="nama">
                                <label for="floatingInputFullname">Full Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="username" class="form-control" id="floatingUsername" placeholder="Username" name="username">
                                <label for="floatingUsername">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPhoneNumber" placeholder="Phone Number" name="notelp">
                                <label for="floatingPhoneNumber">Phone Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputEmail" placeholder="Email" name="email_user">
                                <label for="floatingEmail">Email</label>
                            </div>

                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                            </div>
                        </form>
                        <a class="d-block text-center mt-2 small" href="<?php echo base_url('auth/login') ?>">Have an account? Sign In</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>