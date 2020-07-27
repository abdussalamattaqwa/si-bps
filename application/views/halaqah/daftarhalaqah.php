<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Fakultas <?= $fakultas; ?></h1>


    <div class="row">
        <a href="<?= base_url('halaqah/daftarjurusan/' . $fakultas); ?>" class="btn btn-primary mb-3">Tambah Halaqah</a>

        <label for="angkatan" class="col-lg-1 col-form-label">Angkatan</label>
        <div class="col-lg-2">
            <select name="" id="" class="form-control select_angkatan">
                <?php foreach ($tahun as $t) :
                    if ($t['selected'] == '') { ?>
                        <a href="">
                            <option><?= $t['tahun']; ?></option>
                        </a>
                    <?php } else { ?>
                        <option <?= $t['selected']; ?>><?= $t['tahun']; ?></option>
                <?php }
                endforeach; ?>
            </select>
        </div>

        <label class="col-lg-1 col-form-label">Semester</label>
        <div class="col-lg-2">

            <select name="" id="" class="form-control select_semester">
                <option <?= ($semester == 'Ganjil') ? 'selected' : ''; ?>>Ganjil</option>
                <option <?= ($semester == 'Genap') ? 'selected' : ''; ?>>Genap</option>
            </select>
        </div>

        <label class="col-lg-1 col-form-label">Gender</label>
        <?php if ($status == 'dosen') { ?>
            <div class="col-lg-2">
                <select name="jk" id="" class="form-control select_jk" onchange="select_gender()">
                    <option value="semua" <?= ($jk == 'semua') ? 'selected' : ''; ?>>semua</option>
                    <option value="L" <?= ($jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="P" <?= ($jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <br>
            <br>
        <?php } else { ?>
            <div class="col-lg-2">
                <input type="text" class="form-control" readonly value="<?= ($user['jk'] == 'L') ? 'Ikhwah' : 'Akhwat'; ?>">
            </div>
        <?php } ?>
    </div>

    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900 tbody" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nama</th>
                            <?php if ($jk == 'semua')
                                echo '<th scope="col">JK</th>' ?>
                            <th scope="col">Tutor</th>
                            <th scope="col">Anggota</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($halaqah as $h) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $h['kelas']; ?></td>
                                <td><?= $h['level']; ?></td>
                                <?php if ($jk == 'semua')
                                    echo '<td>' . $h['jk'] . '</td>' ?>
                                <td><?= $h['nama']; ?></td>
                                <td>
                                    <?= $h['jumlah_anggota']; ?>
                                </td>
                                <td>
                                    <?= $pilihan_angkatan; ?>
                                    <a href="<?= base_url('halaqah/daftarmahasiswa/' . $pilihan_angkatan . '/' . $h['id_kelas']); ?>?jk=<?= $h['jk']; ?>" class="badge badge-success">Edit</a>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    const sAngkatan = document.querySelector('.select_angkatan');
    const tbody = document.querySelector('.tbody');
    const sSemester = document.querySelector('.select_semester');

    sAngkatan.addEventListener('change', function() {
        let tahun = sAngkatan.selectedOptions[0].text;
        let semester = sSemester.selectedOptions[0].text;

        fetch(`<?= base_url('halaqah/ajax_data_halaqah/' . $fakultas); ?>?tahun=${tahun}&semester=${semester}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);

        // window.location = `<?= base_url('halaqah/fakultas/' . $fakultas); ?>?tahun=${pilihanAngkatan}`;
    });

    sSemester.addEventListener('change', function() {
        let tahun = sAngkatan.selectedOptions[0].text;
        let semester = sSemester.selectedOptions[0].text;

        fetch(`<?= base_url('halaqah/ajax_data_halaqah/' . $fakultas); ?>?tahun=${tahun}&semester=${semester}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);

    });

    function select_gender() {
        const select_jk = document.querySelector('.select_jk');
        let jk = select_jk.selectedOptions[0].value;
        let tahun = sAngkatan.selectedOptions[0].text;
        let semester = sSemester.selectedOptions[0].text;

        fetch(`<?= base_url('halaqah/ajax_data_halaqah/' . $fakultas); ?>?tahun=${tahun}&semester=${semester}&jk=${jk}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);
        // console.log(jk);

        // window.open(`?jk=${jk}`, '_self');

    }
</script>