<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Transaksi</h3>
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
                    <select name="id_pasien" class="form-control">
                        <option value="">--Pilih Pasien--</option>
                        <?php foreach ($pasien as $key => $value) { ?>
                        <option value="<?= $value['id_pasien'] ?>"><?= $value['nama'] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Terapis</label>
                    <select name="id_terapis" class="form-control">
                        <option value="">--Pilih Terapis--</option>
                        <?php foreach ($terapis as $key => $value) { ?>
                        <option value="<?= $value['id_terapis'] ?>">[<?= $value['kd_terapis']?>] <?= $value['nama_terapis'] ?></option>
                        <?php } ?>

                    </select>
                </div>
                
                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" class="form-control" name="tgl_transaksi" >
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jml" >
                </div>
                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="number" class="form-control" name="harga" >
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