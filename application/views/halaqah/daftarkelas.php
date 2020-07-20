<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pilih Kelas</h1>

    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $prodi['prodi']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Semester</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $prodi['semester']; ?>" readonly>
        </div>
    </div>
    <div class="row">
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

    <br>

    <div class="row">
        <div class="col-lg-8">
            <table class="table table-hover text-gray-900 table-responsive">
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
                    <?php foreach ($daftar_kelas as $dk) : ?>
                        <tr>
                            <td> <?= $i; ?> </th>
                            <td><?= $dk['kelas']; ?></td>
                            <td><?= $dk['anggota']; ?></td>
                            <td>
                                <a href="<?= base_url('halaqah/daftarmahasiswa/' . date('Y') . '/' . $dk['id']); ?>" class="badge badge-primary tombolPilih">Pilih</a>
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

    sAngkatan.addEventListener('change', function() {


        let tahun = sAngkatan.selectedOptions[0].text;

        const tbody = document.querySelector('.tbody');
        fetch(`<?= base_url('halaqah/ajax_daftar_kelas/' . $prodi['id']) ?>/${tahun}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);

    });
</script>