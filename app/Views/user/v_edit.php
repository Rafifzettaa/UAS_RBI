<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Admin</h3>
            </div>
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
                <?= form_open_multipart('user/update/' . $user['id_admin']); ?>
                <div class="form-group">
                    <label>Nama Admin</label>
                    <input name="nama_admin" value="<?= esc($user['nama_admin']) ?>" class="form-control" placeholder="Nama Admin">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?= esc($user['username']) ?>" class="form-control" placeholder="E-Mail" readonly>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?= esc($user['password']) ?>" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Foto Admin</label>
                        <img src="<?= base_url('foto/' . $user['foto']) ?>" width="100px" alt="User Photo">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Ganti Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('user') ?>" class="btn btn-success">Kembali</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
