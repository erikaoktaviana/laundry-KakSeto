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
            <li class="nav-item">
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
                        <li class="nav-item active">
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


<div class="card text-center col-md-10 offset-md-1 mt-2">
        <div class="card-header">
            Welcome
        </div>
        <div class="card-body">
            <img class="img-fluid" style="width: 15rem;" src="assets/img/illustrasi.jpg" alt="Illustrasi">
            <h5 class="card-title">LAUNDRY KAK SETO</h5>
            <h6 class="card-text">Bersih, Rapi dan Wangi</h6>
            <p>Alamat : Jambu Kidul RT. 002/RW.008, Ceper</p>
            <p>Telp   : 082 322 863 837</p>
        </div>
</div>
<br>