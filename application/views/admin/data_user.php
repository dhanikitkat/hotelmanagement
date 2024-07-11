<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_user"><i class="fa fa-plus"></i> Tambah User</button>
        </div>
        <div class="col-6 text-right">
            <?php echo str_replace('<a ', '<a class="page-link" ', $this->pagination->create_links()); ?>
        </div>
    </div>
    <?php echo $this->session->flashdata('message'); ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role ID</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th colspan="3" class="text-center">Aksi</th>
            </tr>
        </thead>
        <?php $no = $this->pagination->cur_page * $this->pagination->per_page - ($this->pagination->per_page - 1);
        foreach ($users as $usr) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $usr->nama ?></td>
                <td><?php echo $usr->username ?></td>
                <td>
                    <?php
                    if ($usr->role_id == 1) {
                        echo "Admin";
                    } elseif ($usr->role_id == 2) {
                        echo "Operator";
                    }
                    ?>
                </td>
                <td><?php echo $usr->notelp ?></td>
                <td><?php echo $usr->email_user ?></td>
                <td><?php echo anchor('admin/data_user/edit/' . $usr->id_user, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td>
                    <a href="<?php echo base_url('admin/data_user/hapus/' . $usr->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus user ini?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/data_user/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Role ID</label>
                        <select name="role_id" class="form-control" required>
                            <option value="">Pilih Salah Satu</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="notelp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_user" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>