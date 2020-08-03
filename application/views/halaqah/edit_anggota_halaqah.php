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
    <form action="<?= base_url('halaqah/edit_anggota/') . $tahun . '/' . $idkelas . '?jk=' . $jk; ?>" method="post">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-hover text-gray-900 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Pre Test</th>
                            <th scope="col">Pilih Halaqah</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php
                        $i = 1;
                        foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $mhs['nama']; ?></td>
                                <td><?= $mhs['pre_test']; ?></td>
                                <td>
                                    <select name="<?= $mhs['id']; ?>" id="" class="form-control">
                                        <option value="0">Belum Ada</option>
                                        <?php foreach ($halaqah as $h) : ?>
                                            <option value="<?= $h['id']; ?>" <?= ($mhs['id_halaqah'] == $h['id']) ? 'selected' : ''; ?>><?= $h['level']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-primary ml-4 col-lg-2" type="submit">Selesai</button>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>

</script>