<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Data Hotel</h3>
    <?php echo $this->session->flashdata('message'); ?>
    <form action="<?php echo base_url() . 'data_hotel/update'; ?>" method="post" enctype="multipart/form-data">

        <?php foreach ($hotel as $h) : ?>

            <input type="hidden" name="id_hotel" value="<?php echo $h->id_hotel; ?>">

            <div class="form-group">
                <label>Nama Hotel</label>
                <input type="text" name="nama_hotel" class="form-control" value="<?php echo $h->nama_hotel; ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $h->alamat; ?>">
            </div>

            <div class="form-group">
                <label>Fasilitas</label>
                <input type="text" name="fasilitas" class="form-control" value="<?php echo $h->fasilitas; ?>">
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?php echo $h->telepon; ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $h->email; ?>">
            </div>

            <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" class="form-control" value="<?php echo $h->website; ?>">
            </div>

            <div class="form-group">
                <label>Harga Minimum</label>
                <input type="text" name="harga_min" class="form-control" value="<?php echo $h->harga_min; ?>">
            </div>

            <div class="form-group">
                <label>Harga Maximum</label>
                <input type="text" name="harga_max" class="form-control" value="<?php echo $h->harga_max; ?>">
            </div>

            <div class="form-group">
                <label>Gambar Hotel</label>
                <?php if ($h->gambar_hotel != NULL) { ?>
                    <br>
                    <img src="<?php echo base_url('uploads/' . $h->gambar_hotel); ?>" width="100px">
                    <br><br>
                <?php } ?>
                <input type="file" name="gambar_hotel" class="form-control" value="<?php echo $h->gambar_hotel; ?>">
            </div>

        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>

    </form>

</div>