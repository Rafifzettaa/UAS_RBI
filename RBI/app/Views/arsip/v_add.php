<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Layanan</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <h5>Ada Kesalahan !!!</h5>
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                        <li><?= esc($value) ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
                <?php
                echo form_open_multipart('arsip/insert');
                helper('text');
                ?>
                <div class="form-group">
                    <label>Nama Layanan</label>
                    <select name="id_layanan" class="form-control">
                        <option value="">--Pilih Layanan--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                        <option value="<?= $value['id_layanan'] ?>"><?= $value['nama_layanan'] ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input name="nama_pasien" class="form-control" placeholder="Nama Pasien">
                </div>
                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input name="nama_layanan" class="form-control" placeholder="Nama Document">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file_arsip" class="form-control">
                    <label class="text-danger">File Harus Format .PDF</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('arsip') ?>" class="btn btn-success">Kembali</a>
                </div>

                <?php echo form_close() ?>

            </div>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3">
    </div>
</div>