<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>


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
        <label class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?= $prodi['prodi']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Semester</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?= $prodi['semester']; ?>" readonly>
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
        <div class="col-lg-8 table-responsive">
            <table class="table table-hover text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Jumlah Mahasiswa</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $dk) : ?>
                        <tr>
                            <th scope="row"> <?= $i; ?> </th>
                            <td><?= $dk['kelas']; ?></td>
                            <td><?= $dk['anggota']; ?></td>
                            <td>
                                <a href="<?= base_url('ujian/mahasiswa/' . $dk['id'] . '?tahun=' . $angkatan); ?>" class="btn btn-primary btn-sm pilih_kelas"><i class="fas fa-fw fa-mouse-pointer"></i> Pilih</a>
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
        let pilihanAngkatan = sAngkatan.selectedOptions[0].text;
        // console.log('okoko');
        fetch(`<?= base_url('ujian/ajax_data_kelas/' . $this->uri->segment(3)) ?>?tahun=${pilihanAngkatan}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);
    });
</script>