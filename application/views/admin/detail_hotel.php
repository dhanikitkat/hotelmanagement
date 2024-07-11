<div class="container-fluid">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <?php foreach ($hotel as $htl) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $htl->gambar_hotel ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Hotel</th>
                                <td><?php echo $htl->nama_hotel ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $htl->alamat ?></td>
                            </tr>
                            <tr>
                                <th>Fasilitas</th>
                                <td><?php echo $htl->fasilitas ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?php echo $htl->telepon ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $htl->email ?></td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td><?php echo $htl->website ?></td>
                            </tr>
                            <tr>
                                <th>Harga Min</th>
                                <td>Rp. <?php echo number_format($htl->harga_min, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <th>Harga Max</th>
                                <td>Rp. <?php echo number_format($htl->harga_max, 0, ',', '.') ?></td>
                            </tr>
                        </table>
                        <tr class="ml-2">
                            <td><button class="btn btn-sm btn-secondary" onclick="window.location.href='<?php echo base_url('admin/data_hotel/') ?>'"><i class="fa-solid fa-backward"></i> Kembali</button></td>
                            <td><?php echo anchor('admin/data_hotel/edit/' . $htl->id_hotel, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                            <td><?php echo anchor('admin/data_hotel/hapus/' . $htl->id_hotel, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
                        </tr>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>