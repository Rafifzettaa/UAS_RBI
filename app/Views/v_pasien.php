<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pasien</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-success btn-sm btn-flat" data-toggle="modal"
                        data-target="#add">
                        <i class="fa fa-plus"></i> Add</button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success! - ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>No Telpon</th>
                            <th>Usia</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pasien as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['alamat']; ?></td>
                            <td><?= $value['tanggal_lahir']; ?></td>
                            <td><?= $value['no_telepon']; ?></td>
                            <td><?= $value['usia']; ?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-warning" data-toggle="modal"
                                    data-target="#edit<?= $value['id_pasien']; ?>">Edit</button>
                                <button class="btn btn-xs btn-danger" data-toggle="modal"
                                    data-target="#delete<?= $value['id_pasien']; ?>">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- /.modal add dep -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Pasien</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('pasien/add')
                ?>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input name="nama_pasien" class="form-control" placeholder="Nama Pasien" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>No Telfon</label>
                    <input type="number" name="nomor_tlp" class="form-control" placeholder="Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label>Usia</label>
                    <input type="number" name="usia" class="form-control" placeholder="Masukkan Usia" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal add dep -->


<!-- /.modal edit dep -->
<?php foreach ($pasien as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_pasien']; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Pasien</h4>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open('pasien/edit/' . $value['id_pasien'])
                    ?>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input name="nama_pasien" value="<?= $value['nama'] ?>" class="form-control"
                        placeholder="Nama Pasien" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" value="<?= $value['alamat'] ?>" class="form-control" placeholder="Alamat"
                        required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="<?= $value['tanggal_lahir'] ?>" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label>No Telfon</label>
                    <input type="number" name="nomor_tlp" class="form-control" value="<?= $value['no_telepon'] ?>"
                        placeholder="Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label>Usia</label>
                    <input type="number" name="usia" value="<?= $value['usia'] ?>" class="form-control"
                        placeholder="Masukkan Usia" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- end modal edit dep -->


<!-- /.modal delete dep -->
<?php foreach ($pasien as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_pasien']; ?>">
    <div class="modal-dialog modal-sm modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Pasien</h4>
            </div>
            <div class="modal-body">

                Apakah Anda Yakin Ingin Hapus Pasien Yang Bernama <?= $value['nama']; ?>..?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('pasien/delete/' . $value['id_pasien']) ?>" type="submit"
                    class="btn btn-primary">Ya</a>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- end modal delete dep -->