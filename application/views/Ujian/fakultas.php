<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($jurusan as $dj) : ?>
        <?php if ($dj['tingkat'] == 2) : ?>
            <div class="ml-3 border-left-info" style="padding-left: 12px;">
                <h4><?= $dj['jurusan']; ?></h4>
            </div>
            <?php foreach ($jurusan as $dp) : ?>
                <?php if ($dp['tingkat'] == 3 && $dp['jurusan'] == $dj['jurusan']) : ?>
                    <ul>
                        <li>
                            <a href="<?= base_url('ujian/kelas/' . $dp['id']); ?>">
                                <h5 class="text-gray-800 " style="display: inline;"><?= $dp['prodi']; ?> - Semester <b class="text-<?= ($dp['semester'] == 'Ganjil') ?
                                                                                                                                        'primary' : 'warning' ?>">
                                        <?= $dp['semester'] ?>
                                    </b></h5>
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php endforeach; ?>
            <br>
        <?php endif; ?>

    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->