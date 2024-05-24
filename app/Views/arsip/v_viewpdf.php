<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>Nama Document</th>
                <th>:</th>
                <td><?= $arsip['nama_arsip'] ?></td>
                <th>Ukuran File</th>
                <th>:</th>
                <td><?= $arsip['ukuran_file'] ?> Byte</td>
            </tr>
            <tr>
                <th width="120px">Tanggal Upload</th>
                <th width="30px">:</th>
                <td><?= $arsip['tgl_upload'] ?></td>
                <th>Deskripsi</th>
                <th>:</th>
                <td><?= $arsip['deskripsi'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Update</th>
                <th>:</th>
                <td><?= $arsip['tgl_update'] ?></td>
                <th>Admin</th>
                <th>:</th>
                <td><?= $arsip['nama_user'] ?></td>
            </tr>
            <tr>
                <th>Departemen</th>
                <th>:</th>
                <td><?= $arsip['nama_dep'] ?></td>
            </tr>
        </table>
    </div>

    <div class="col-sm-12">
        <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" style="border:2px solid blue;" height="1000px" width="100%"></iframe>
    </div>

</div>