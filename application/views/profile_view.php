<div class="container-fluid">
    <div class="card">
        <div class="card-header text-dark font-weight-bold">
            Profile
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url() ?>assets/img/undraw_profile.svg" class="card-img-top" style="width: auto; margin:40px">
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td><?php echo $user->nama ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $user->username ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                <?php
                                if ($user->role_id == 1) {
                                    echo "Admin";
                                } elseif ($user->role_id == 2) {
                                    echo "Operator";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Telephone</th>
                            <td><?php echo $user->notelp ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $user->email_user ?></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url('profile/edit') ?>" class="btn btn-primary">Edit Profile</a>
                    <a href="<?php echo base_url('profile/change_password') ?>" class="btn btn-warning">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>