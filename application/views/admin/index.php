<!-- Begin Page Content -->
<div class="container-fluid text-center text-gray-900">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <h2>SELAMAT DATANG DI SISTEM INFORMASI</h2>

    <h4>BADAN PELAKSANA SAINS</h4>

    <h4>UNIVERSITAS NEGERI MAKASSAR</h4>
    <br>
    <div class="row text-center mt-3">
        <img width="200px" class="rounded mx-auto d-block" src="<?= base_url('assets/'); ?>img/logo-bps.png" alt="">
    </div>


    <div class="row mt-5">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4 ">
            <div class="card border-left-primary shadow h-100 py-2 .bg-gray-200">
                <div class="card-body ">
                    <a href="<?= base_url('admin/daftaruser'); ?>">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h4>Admin</h4>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_user; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <a href="<?= base_url('dosen'); ?>">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <h4>Dosen</h4>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_dosen; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <a href="<?= base_url('tutor'); ?>">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    <h5>Tutor</h5>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_tutor; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->