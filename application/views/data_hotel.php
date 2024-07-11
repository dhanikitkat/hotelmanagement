<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_hotel"><i class="fa fa-plus"></i> Tambah Hotel</button>
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
                <th style="width: 150px;">Gambar Hotel</th>
                <th>Nama Hotel</th>
                <th>Alamat</th>
                <th>Fasilitas</th>
                <th style="width: 150px;">Harga Min</th>
                <th style="width: 150px;">Harga Max</th>
                <th colspan="3" class="text-center">Aksi</th>
            </tr>
        </thead>
        <?php $no = ($this->pagination->cur_page - 1) * $this->pagination->per_page + 1;
        foreach ($hotel as $h) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td>
                    <img src="<?php echo base_url('uploads/' . $h->gambar_hotel); ?>" alt="Gambar Hotel" width="125">
                </td>
                <td class="text-dark font-weight-bold"><?php echo $h->nama_hotel ?></td>
                <td class="text-justify"><?php echo $h->alamat ?></td>
                <td><?php echo $h->fasilitas ?></td>
                <td style="width: 150px;">Rp. <?php echo number_format($h->harga_min, 0, ',', '.') ?></td>
                <td style="width: 150px;">Rp. <?php echo number_format($h->harga_max, 0, ',', '.') ?></td>


                <td><?php echo anchor('data_hotel/detail_hotel/' . $h->id_hotel, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
                <td><?php echo anchor('data_hotel/edit/' . $h->id_hotel, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td>
                    <a href="<?php echo base_url('data_hotel/hapus/' . $h->id_hotel) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus hotel ini?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_hotel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Hotel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'data_hotel/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Hotel</label>
                        <input type="text" name="nama_hotel" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Fasilitas</label>
                        <textarea name="fasilitas" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Min</label>
                        <input type="text" name="harga_min" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Max</label>
                        <input type="text" name="harga_max" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Hotel</label> <br>
                        <input type="file" name="gambar_hotel" class="form-control" required>
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