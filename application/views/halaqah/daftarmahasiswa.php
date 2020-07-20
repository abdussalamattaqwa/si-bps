<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?></h1>
    <div class="form-group row">
        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
        <div class="col-sm-6">
            <input type="text" name="semester" id="semester" class="form-control" value="<?= $kelas['semester']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?= $kelas['kelas']; ?>" readonly>
        </div>
    </div>


    <br>


    <a href class="btn btn-primary mb-3 text-gray-100" data-toggle="modal" data-target="#ModalTambah">Tambah Halaqah</a>

    <a href='<?= base_url('halaqah/printHalaqah/' . $tahun . '/' . $kelas['id']); ?>?jk=<?= $jk; ?>' class="btn btn-danger mb-3 text-gray-100" target="_blank"><i class="fa fa-print"></i> Print</a>
    <!-- <a href='<?= base_url('halaqah/pdfHalaqah/' . $tahun . '/' . $kelas['id']); ?>?jk=<?= $jk; ?>' class="btn btn-warning mb-3 text-gray-100" target="_blank"><i class="fa fa-file"></i> Export PDF</a>
    <a href='<?= base_url('halaqah/excelHalaqah/' . $tahun . '/' . $kelas['id']); ?>?jk=<?= $jk; ?>' class="btn btn-success mb-3 text-gray-100" target="_blank"><i class="fa fa-file-excel"></i> Export Excel</a> -->


    <?= $this->session->flashdata('message'); ?>

    <div class="text-gray-900">


        <?php if ($belum) : ?>

            <h3 class="text-gray-900">Belum ada halaqah</h3>
            <div class="row card-body">
                <div class="col-lg-10 table-responsive">
                    <table class="table table-hover text-gray-900">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nim</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Telp</th>
                                <th scope="col">Pre Test</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($mahasiswa as $mhs) :
                                if ($mhs['id_halaqah'] == 0) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $mhs['nim']; ?></td>
                                        <td><?= $mhs['nama']; ?></td>
                                        <td><?= $mhs['telp']; ?></td>
                                        <td class="text-center">
                                            <?php if ($mhs['pre_test'] == null) $mhs['pre_test'] = 0; ?>
                                            <?= $mhs['pre_test']; ?>
                                        </td>
                                        <td>
                                            <div class="dropdown ">
                                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Pilih Halaqah
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <?php foreach ($halaqah as $level) : ?>
                                                        <a class="dropdown-item" href="<?= base_url('halaqah/pindahhalaqah/' . $tahun . '/' . $kelas['id'] . '/' . $level['id'] . '/' . $mhs['id']); ?>"><?= $level['level']; ?></a>
                                                    <?php endforeach; ?>
                                                    <a class="dropdown-item" href="<?= base_url('halaqah/pindahhalaqah/' . $tahun . '/' . $kelas['id'] . '/0/' . $mhs['id']); ?>">Belum ada</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                            <?php
                                    $i++;
                                endif;
                            endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif; ?>
        <?php
        foreach ($halaqah as $h) : ?>
            <div class="row">
                <div class="card shadow mb-4 col-lg-10">
                    <div class="card-header py-3 row">
                        <div class="col-sm-6">
                            <h3>Halaqah <?= $h['level']; ?></h3>
                        </div>

                        <div class="btn-group ml-4" data-idkelas="<?= $kelas['id']; ?>" data-id="<?= $h['id']; ?>" data-level="<?= $h['level']; ?>">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a href="" class="dropdown-item ubah-halaqah" data-toggle="modal" data-target="#ModalUbah"> Edit Nama Halaqah</a>
                                <a href="" class="dropdown-item hapus-halaqah" data-toggle="modal" data-target="#hapusModal">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="tutor" class="col-sm-1 col-form-label ml-3 mr-1">Tutor</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?= $h['nama']; ?>" readonly>
                        </div>
                        <?php
                        $proses = "isi";
                        if ($h['nama'] != null) $proses = "update";
                        ?>

                        <div class="btn-group ml-3">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a href="<?= base_url('halaqah/tutor/' . $tahun . '/' . $kelas['id'] . '/' . $h['id'] . '/' . $proses); ?>?jk=<?= $jk; ?>" class="dropdown-item">Ubah Tutor</a>

                                <a href="<?= base_url('halaqah/hapustutor/' . $tahun . '/' . $kelas['id'] . '/' . $h['id']); ?>" class="dropdown-item">Hapus Tutor</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">

                        <table class="table table-hover text-gray-900">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nim</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Pre Test</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($mahasiswa as $mhs) : ?>
                                    <?php if ($mhs['id_halaqah'] == $h['id']) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $mhs['nim']; ?></td>
                                            <td><?= $mhs['nama']; ?></td>
                                            <td><?= $mhs['telp']; ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($mhs['pre_test'] == null) $mhs['pre_test'] = 0;
                                                ?>
                                                <?= $mhs['pre_test']; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown ">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih Halaqah
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                        <?php foreach ($halaqah as $level) : ?>
                                                            <a class="dropdown-item" href="<?= base_url('halaqah/pindahhalaqah/' . $tahun . '/' . $kelas['id'] . '/' . $level['id'] . '/' . $mhs['id']); ?>"><?= $level['level']; ?></a>
                                                        <?php endforeach; ?>
                                                        <a class="dropdown-item" href="<?= base_url('halaqah/pindahhalaqah/' . $tahun . '/' . $kelas['id'] . '/0/' . $mhs['id']); ?>">Belum ada</a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                <?php

                                    endif;
                                    $i++;

                                endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<!-- Modal tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely-Tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely-Tambah">Nama halaqah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" , action="<?= base_url('halaqah/tambahlevel/' . $kelas['id']); ?>">
                <div class="modal-body">
                    <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                    <input type="hidden" name="jk" value="<?= $jk; ?>">
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user" placeholder="Nama Halaqah" name="level">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn-modal btn btn-primary">Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal ubah -->
<div class="modal fade" id="ModalUbah" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely-Ubah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely-Ubah">Ubah nama halaqah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user" placeholder="Level" name="level">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn-modal btn btn-primary">Ubah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Hapus Data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                <a class="btn btn-danger" id="deleteButton" style="color: white;">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const hapusHalaqah = document.querySelectorAll('.hapus-halaqah');
    const deleteButton = document.getElementById('deleteButton');
    hapusHalaqah.forEach(function(h) {
        h.addEventListener('click', function() {
            let idhalaqah = this.parentElement.parentElement.dataset.id;
            let idkelas = this.parentElement.parentElement.dataset.idkelas;

            deleteButton.setAttribute('href', `<?= base_url('halaqah/hapushalaqah/'); ?>${idkelas}/${idhalaqah}/<?= $tahun; ?>`);
        });
    });


    const ubahHalaqah = document.querySelectorAll('.ubah-halaqah');
    const mfe = document.getElementById('modal-form-edit');
    const mfeLevel = mfe.querySelector('input[name="level"]')
    ubahHalaqah.forEach(function(uh) {
        uh.addEventListener('click', function() {
            let idhalaqah = this.parentElement.parentElement.dataset.id;
            let idkelas = this.parentElement.parentElement.dataset.idkelas;
            let level = this.parentElement.parentElement.dataset.level;

            mfeLevel.setAttribute('value', level)
            mfe.setAttribute('action', `<?= base_url('halaqah/ubahhalaqah/'); ?>${idkelas}/${idhalaqah}/<?= $tahun; ?>`);
        });
    });
</script>