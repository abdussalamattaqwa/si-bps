<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


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


    <a target="_blank" href="<?= base_url('nilai/print_nilai/' . $tahun . '/' . $kelas['id']); ?>" class="btn btn-danger"> <i class="fa fa-print"></i> Print Nilai</a>
    <!-- <a target="_blank" href="<?= base_url('nilai/pdf_nilai/' . $tahun . '/' . $kelas['id']); ?>" class="btn btn-warning"> <i class="fa fa-file"></i> Export PDF</a>
    <a target="_blank" href="<?= base_url('nilai/excel_nilai/' . $tahun . '/' . $kelas['id']); ?>" class="btn btn-success"> <i class="fa fa-file-excel"></i> Export Excel</a> -->

    <br> <br>

    <div class="row">
        <div class="card shadow mb-4 col-lg-11">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-gray-900" width="100%" cellspacing="0">


                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">Nim</th>
                                <th rowspan="2" class="text-center">Nama</th>
                                <th rowspan="2" class="text-center">JK</th>
                                <th rowspan="2" class="text-center">Kehadiran <br> (45%) </th>
                                <th rowspan=" 2" class="text-center">Mid <br> (15%) </th>
                                <th rowspan="2" class="text-center">Final <br> (30%) </th>
                                <th rowspan="2" class="text-center">Tugas <br> (10%)</th>
                                <th colspan="2" class="text-center">Akhir</th>

                            </tr>
                            <tr>
                                <th>Angka</th>
                                <th>Huruf</th>

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
                                    <td><?= $mhs['jk']; ?></td>
                                    <td><?= ($mhs['kehadiran'] != null) ? $mhs['kehadiran'] : '0'; ?></td>
                                    <td><?= ($mhs['mid'] != null) ? $mhs['mid'] : '0'; ?></td>
                                    <td><?= ($mhs['final_test'] != null) ? $mhs['final_test'] : '0'; ?></td>
                                    <td><?= ($mhs['tugas'] != null) ? $mhs['tugas'] : '0'; ?></td>

                                    <td><?= $mhs['akhir']; ?></td>
                                    <td><?= $mhs['huruf']; ?></td>


                                </tr>
                            <?php
                                $i++;
                            endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->