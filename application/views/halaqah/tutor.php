<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pilih Tutor <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?></h1>


    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $kelas['prodi']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
            <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $kelas['kelas']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="level" class="col-sm-2 col-form-label">Halaqah</label>
        <div class="col-sm-6">
            <input type="text" name="level" id="level" class="form-control" value="<?= $halaqah['level']; ?>" readonly>
        </div>
    </div>
    <br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tutor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tutor as $dtTutor) : ?>
                            <tr>
                                <th scope="row"> <?= $i; ?> </th>
                                <td><?= $dtTutor['nim']; ?></td>
                                <td><?= $dtTutor['name']; ?></td>
                                <td><?= $dtTutor['fakultas']; ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="<?= base_url('halaqah/settutor/' . $tahun . '/' . $kelas['id'] . '/' . $halaqah['id'] . '/' . $dtTutor['id']); ?>?jk=<?= $jk; ?>" class=" btn btn-primary btn-sm"><i class="fas fa-fw fa-mouse-pointer"></i> Pilih</a>

                                    </a>
                                </td>
                            </tr>

                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->