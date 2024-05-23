<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url('home') ?>">Home</a></li>
        <li><a href="<?= base_url('layanan') ?>">Layanan</a></li>
        <li><a href="<?= base_url('pasien') ?>">Pasien</a></li>
        <li><a href="<?= base_url('arsip') ?>">Riwayat Transaksi</a></li>
        <li><a href="<?= base_url('user') ?>">Admin</a></li>
        <li><a href="<?= base_url('karyawan') ?>">Data Karyawan</a></li>
    </ul>
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= session()->get('nama_admin') ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <p>
                        <?= session()->get('nama_admin') ?>
                        <small><?php echo "" . date("d-m-Y"); ?></small>
                    </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-right">
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Rumah Bekam Indonesia</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">