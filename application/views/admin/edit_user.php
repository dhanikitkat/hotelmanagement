<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Data User</h3>
    <?php echo $this->session->flashdata('message'); ?>
    <form action="<?php echo base_url() . 'admin/data_user/update'; ?>" method="post" enctype="multipart/form-data">

        <?php foreach ($user as $u) : ?>

            <input type="hidden" name="id_user" value="<?php echo $u->id_user; ?>">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $u->nama; ?>">
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $u->username; ?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
                <label>Role ID</label>
                <select name="role_id" class="form-control" required>
                    <option value="1" <?php echo ($u->role_id == '1') ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo ($u->role_id == '2') ? 'selected' : ''; ?>>Operator</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="notelp" class="form-control" value="<?php echo $u->notelp; ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email_user" class="form-control" value="<?php echo $u->email_user; ?>">
            </div>

        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>

    </form>

</div>