<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Isi nilai <?= $jenis_nilai; ?></h1>

    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $halaqah['prodi']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
            <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $halaqah['kelas']; ?>" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Halaqah</label>
        <div class="col-sm-6">
            <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $halaqah['level']; ?>" readonly>
        </div>
    </div>

    <form method="POST" action="<?= base_url('binaan/input/' . $jenis_nilai . '/' . $halaqah['idhalaqah']); ?>">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-hover text-gray-900 table-responsive" style="margin: auto;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="150px">Nim</th>
                            <th width="200px">Nama</th>
                            <th>Nilai <?= $jenis_nilai; ?></th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($mahasiswa as $mhs) : ?>

                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $mhs['nim']; ?></td>
                                <td><?= $mhs['nama']; ?></td>
                                <td>

                                    <input type="number" class="col-sm-4" name="<?= $mhs['id']; ?>" value="<?= $mhs['nilai']; ?>" class="form-control">
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <br>

            <div class="col-sm-2 ">
                <button type="submit" class="btn-modal btn btn-primary btn-block">
                    Simpan
                </button>
            </div>
        </div>
    </form>
    <br>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->