<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pilih Jurusan</h1>


    <?php foreach ($jurusan as $j) : ?>
        <?php if ($j['tingkat'] == 2) : ?>
            <div class="ml-3 border-left-info" style="padding-left: 12px;">
                <h4><?= $j['jurusan']; ?></h4>
            </div>
            <?php foreach ($jurusan as $dp) : ?>
                <?php if ($dp['tingkat'] == 3 && $dp['jurusan'] == $j['jurusan']) : ?>
                    <ul>
                        <li>
                            <a href="<?= base_url('halaqah/daftarkelas/' . $dp['id']); ?>">
                                <h5 class="text-gray-800"><?= $dp['prodi']; ?> - Semester <b class="text-<?= ($dp['semester'] == 'Ganjil') ?                                                          'primary' : 'warning' ?>">
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
</div>
<br>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->