<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <an class="box-title">Data Layanan</an>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-success btn-sm btn-flat" data-toggle="modal" data-target="#add">
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
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($layanan as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_layanan']; ?></td>
                                <td>Rp.<?= number_format($value['harga']); ?></td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_layanan']; ?>">Edit</button>
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_layanan']; ?>">Delete</button>
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

<!-- /.modal add kategori -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Layanan</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('layanan/add')
                ?>

                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input name="nama_layanan" class="form-control" placeholder="Nama Layanan" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input name="harga" class="form-control" placeholder="Harga Layanan" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal add kategori -->


<!-- /.modal edit kategori -->
<?php foreach ($layanan as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_layanan']; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Layanan</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('layanan/edit/' . $value['id_layanan'])
                    ?>

                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input name="nama_layanan" value="<?= $value['nama_layanan']; ?>" class="form-control" placeholder="Nama Layanan" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" value="<?= $value['harga']; ?>" class="form-control" placeholder="Harga Layanan" required>
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
<!-- end modal edit kategori -->


<!-- /.modal delete kategori -->
<?php foreach ($layanan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_layanan']; ?>">
        <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <ana class="modal-title">Delete Layanan</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Hapus <?= $value['nama_layanan']; ?>..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('layanan/delete/' . $value['id_layanan']) ?>" type="submit" class="btn btn-primary">Ya</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- end modal delete kategori -->