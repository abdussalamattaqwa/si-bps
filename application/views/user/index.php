<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 "><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 mb-2">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img img-thumbnail" alt="...">
        </div>

        <div class="col-lg-5 mb-2">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-5">
                            <p>Nama</p>
                        </div>
                        : <?= $user['name']; ?>
                    </div>

                    <div class="row">
                        <div class="col-5">

                            <p>Username</p>
                        </div>
                        : <?= $user['username']; ?>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <p>Email</p>
                        </div>
                        : <?= $user['email']; ?>
                    </div>

                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <?php if ($status === 'dosen') { ?>
                <div class="card mb-4 shadow">
                    <div class="card-header text-primary">
                        <b>Dosen</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <p>NIP</p>
                            </div>
                            : <?= $user['nip']; ?>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p>Telp</p>
                            </div>
                            : <?= $user['telp']; ?>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p>Alamat</p>
                            </div>
                            : <?= $user['alamat']; ?>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p>Jk</p>
                            </div>
                            : <?= $user['jk']; ?>
                        </div>
                    </div>
                </div>
            <?php } else if ($status === 'tutor') { ?>
                <div class="card mb-4 shadow">
                    <div class="card-header text-primary">
                        <b>Tutor</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <p>NIM</p>
                            </div>
                            : <?= $user['nim']; ?>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p>Telp</p>
                            </div>
                            : <?= $user['telp']; ?>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p>Alamat</p>
                            </div>
                            : <?= $user['alamat']; ?>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p>Jk</p>
                            </div>
                            : <?= $user['jk']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->