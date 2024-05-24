<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $tot_karyawan; ?></h3>
                <p>Karyawan</p>
            </div>
            <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="<?= base_url('karyawan') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $tot_layanan; ?></h3>

                <p>Layanan</p>
            </div>
            <div class="icon">
                <i class="fa fa-bookmark-o"></i>
            </div>
            <a href="<?= base_url('layanan') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $tot_transaksi; ?></h3>

                <p>Total Transaksi</p>
            </div>
            <div class="icon">
            <i class="fa-"></i>            </div>
            <a href="<?= base_url('transaksi') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $tot_admin; ?></h3>

                <p>Admin</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url('user') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>

        </div>
    </div>


</div>