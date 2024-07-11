<div class="container-fluid">
    <div class="card">
        <div class="card-header text-dark font-weight-bold">
            Edit Profile
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <?php echo form_open('admin/profile/update') ?>
                    <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">
                    <div class="form-group">
                        <label for="nama" class="text-dark font-weight-bold">Full Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="notelp" class="text-dark font-weight-bold">Telepon</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $user->notelp ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark font-weight-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $user->email_user ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>