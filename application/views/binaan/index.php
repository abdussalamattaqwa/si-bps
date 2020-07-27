<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->

    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 col-lg-3"><?= $title; ?></h1>


        <label for="angkatan" class="col-lg-1 col-form-label">Angkatan</label>
        <div class="col-lg-2">
            <select name="" id="" class="form-control select_angkatan">
                <?php foreach ($tahun as $t) : ?>
                    <option <?= $t['selected']; ?>><?= $t['tahun']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <label class="col-lg-1 col-form-label">Semester</label>
        <div class="col-lg-2">

            <select name="" id="" class="form-control select_semester">
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
        </div>

    </div>
    <br>
    <div class="row tbody">
        <?php
        if (count($halaqah) < 1) {
            echo '<div class="alert alert-danger" role="alert">Halaqah tidak ditemukan, silahkan hubungi kordinator fakultas atau kordinator BPS UNM</div>';
        }
        ?>

        <?php foreach ($halaqah as $h) : ?> <div class="card shadow mt-4 col-md-5 ml-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kelas <?= $h['kelas']; ?></h6>
                </div>
                <div class="card-body">
                    <p class="card-text">Halaqah <?= $h['level']; ?>.</p>
                    <a href="<?= base_url('binaan/nilai/' . $h['id']); ?>" class="btn btn-primary">Pilih</a>
                </div>
            </div>
        <?php endforeach; ?>


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

        fetch(`<?= base_url('binaan/ajax_data_binaan'); ?>?tahun=${tahun}&semester=${semester}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);
    });

    sSemester.addEventListener('change', function() {
        let tahun = sAngkatan.selectedOptions[0].text;
        let semester = sSemester.selectedOptions[0].text;

        fetch(`<?= base_url('binaan/ajax_data_binaan'); ?>?tahun=${tahun}&semester=${semester}`)
            .then(r => r.text())
            .then(r => tbody.innerHTML = r);

    });
</script>