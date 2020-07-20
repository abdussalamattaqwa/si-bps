<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 "><?= $title; ?></h1>



    <div class="form-group row">
        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
        <div class="col-sm-6">
            <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= $prodi['fakultas']; ?>" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-6">
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $prodi['jurusan']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $prodi['prodi']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
        <div class="col-sm-6">
            <select name="" id="" class="form-control select_angkatan">
                <?php foreach ($tahun as $t) :
                    if ($t['selected'] == '') { ?>
                        <a href="">
                            <option><?= $t['angkatan']; ?></option>
                        </a>
                    <?php } else { ?>
                        <option <?= $t['selected']; ?>><?= $t['angkatan']; ?></option>
                <?php }
                endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <table class="table table-hover text-gray-900 table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Jumlah Mahasiswa</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_kelas as $dk) : ?>
                        <tr>
                            <td> <?= $i; ?> </th>
                            <td><?= $dk['kelas']; ?></td>
                            <td><?= $dk['anggota']; ?></td>
                            <td>
                                <div class="row">
                                    <a href="<?= base_url('nilai/nilaikelas/' . $angkatan . '/' . $dk['id']); ?>" class="btn btn-primary  btn-sm">Lihat Nilai</a>
                                    <a href="<?= base_url('nilai/print_nilai/' . $angkatan . '/' . $dk['id']); ?>" class="btn btn-danger  btn-sm ml-2" target="_blank"> <i class="fa fa-print"></i> Print</a>
                                    <!-- <div class="dropdown ml-3">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCetakButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Cetak
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownCetakButton">
                                            <a href="<?= base_url('nilai/print_nilai/' . $angkatan . '/' . $dk['id']); ?>" class="dropdown-item" target="_blank"> <i class="fa fa-print"></i> Print</a>

                                            <a href="<?= base_url('nilai/pdf_nilai/' . $angkatan . '/' . $dk['id']); ?>" class="btn-sm dropdown-item" target="_blank"> <i class="fa fa-file"></i> Export PDF</a>

                                            <a href="<?= base_url('nilai/excel_nilai/' . $angkatan . '/' . $dk['id']); ?>" class=" dropdown-item" target="_blank"> <i class="fa fa-file-excel"></i> Export Excel</a>
                                        </div>
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    const sAngkatan = document.querySelector('.select_angkatan');
    const tbody = document.querySelector('.tbody');


    sAngkatan.addEventListener('change', function() {
        let tahun = sAngkatan.selectedOptions[0].text;

        fetch(`<?= base_url('nilai/ajax_data_kelas/' . $prodi['id']) ?>/${tahun}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);
    });
</script>