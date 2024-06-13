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
            <li class="nav-item active">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="d-flex justify-content-end mx-4 pt-4">
                    
                        <!-- Topbar Search -->
                        <form action="<?= base_url('LaundryController/searchCustomer') ?>" method="post" class="form-inline mr-auto  navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." name = "keyword" autocomplete = "off" autofocus>
                            </div>
                            <div class = "float-right ml-2">
                            <button type = "submit" class = "btn btn-primary"><i class = "fas fa-search"> </i></button>
                            </div>
                        </form>
                            <a href="<?= base_url('LaundryController/inputcustomer'); ?>" class="btn btn-success">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>Telp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        if (!empty($customer)) {
                                            foreach ($customer as $data) :
                                        ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['alamat'] ?></td>
                                                    <td><?= $data['telp'] ?></td>
                                                    <td>
                                                        <a class="btn text-white" style="background-color: orange;" href="<?= base_url() ?>LaundryController/formUpdateCustomer/<?= $data['id_customer'] ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class = "btn text-white" style="background-color: red;" href="<?= base_url() ?>LaundryController/deleteCustomer/<?= $data['id_customer'] ?>" onclick="return confirm('Apakah kamu yakin?')">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<script>
    setTimeout(function() {
        var alert = document.querySelector(".alert");
        alert.style.display = "none";
    }, 5000);
</script>