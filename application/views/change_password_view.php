<div class="container-fluid">
    <div class="card">
        <div class="card-header text-dark font-weight-bold">
            Ganti Password
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-8">
                    <?php echo form_open('profile/update_password'); ?>
                    <div class="form-group">
                        <label for="currentPassword" class="text-dark font-weight-bold">Password Saat Ini</label>
                        <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword" class="text-dark font-weight-bold">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" class="text-dark font-weight-bold">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>