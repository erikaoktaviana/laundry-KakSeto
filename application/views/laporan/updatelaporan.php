<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-2">Laundry Kak Seto</div>
            </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('LaundryController/tampilpaket') ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Paket Laundry</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('LaundryController/tampilcustomer') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Customer</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('LaundryController/tampillaporan') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="<?= base_url('') ?>">
                                <span>Dashboard</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                </div>

    <!-- alert akan ditampilkan di sini -->
    <?php if ($this->session->flashdata('alert')): ?>
        <div class="alert alert-success">
    <?php echo $this->session->flashdata('alert'); ?>
        </div>
   <?php endif; ?>
    <div class="container" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('LaundryController/updateLaporan'); ?>" method="post">
                        
                                <input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan ?>">
                            <div class="mb-3">
                                <label class="form-label">No Struk</label>
                                <input type="text" name="noStruk" class="form-control" value="<?= $laporan->noStruk ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" name="tglTransaksi" class="form-control" value="<?= $laporan->tglTransaksi ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="id_customer">Nama Customer</label>
                                    <select name="id_customer" class="form-control">
                                        <?php foreach ($customer as $data): ?>
                                            <option value="<?php echo $data->id_customer ?>" <?php echo ($data->id_customer == $laporan->id_customer) ? 'selected' : '' ?>><?php echo $data->nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                            </div>
                            <div class="row">
                                <div class = "col">
                                    <label for="id_paket">Jenis Paket</label>
                                        <select name="id_paket" class="form-control">
                                            <?php foreach ($paket as $data): ?>
                                                <option value="<?php echo $data->id_paket ?>" <?php echo ($data->id_paket == $laporan->id_paket) ? 'selected' : '' ?>><?php echo $data->jenisPaket ?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Jumlah/Kg</label>
                                        <input type="text" name="berat" id="berat" class="form-control" value="<?= $laporan->berat ?>" autocomplete="off">
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                    <select name="status" class = "form-control" autocomplete="off"  required>
                                        <option value="Proses" <?= $laporan->status == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                        <option value="Selesai" <?= $laporan->status == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                        <option value="Diambil" <?= $laporan->status == 'Diambil' ? 'selected' : '' ?>>Diambil</option>
                                    </select>
                            </div>
                            <div>
                                <a href="<?php echo base_url('LaundryController/tampillaporan'); ?>" class="btn btn-secondary float-left">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

<script>
    setTimeout(function() {
        var alert = document.querySelector(".alert");
        alert.style.display = "none";
    }, 1000);
</script>