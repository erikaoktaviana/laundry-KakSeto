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
            <div class="col-md-10 offset-md-1 mt-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('LaundryController/simpanLaporan'); ?>" method="post">
                            
                            <div class="mb-3">
                                <label class="form-label">No Struk</label>
                                <input type="text" name="noStruk" class="form-control" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <select name="id_customer" class="form-control" required>
                                    <?php foreach ($customer as $data) : ?>
                                    <option value="<?= $data->id_customer ?>"><?= $data->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name = "tglTransaksi" autocomplete="off" >
                            </div>
                           <div class="row">
                            <div class="col">
                                <label class="form-label">Jenis Paket</label>
                                <select name="id_paket" class="form-control" autocomplete="off"  required>
                                    <?php foreach ($paket as $data) : ?>
                                    <option value="<?= $data->id_paket ?>"><?= $data->jenisPaket ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Jumlah/Kg</label>
                                <input type="text" class="form-control" autocomplete="off"  name = "berat">
                            </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class = "form-control" autocomplete="off"  required>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Diambil">Diambil</option>
                                </select>
                            </div>
                                <a href="<?php echo base_url('LaundryController/tampillaporan'); ?>" class="btn btn-secondary float-left">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>

                        </div>
            </div>
    </div>