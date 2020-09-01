<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <?php foreach ($jurusan as $dj) : ?>
        <?php if ($dj['tingkat'] == 2) : ?>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#jurusan<?= $dj['id']; ?>" aria-expanded="false" aria-controls="jurusan<?= $dj['id']; ?>">
                        <?= $dj['jurusan']; ?>
                    </button>
                </div>
            </div>
            <div class="collapse" id="jurusan<?= $dj['id']; ?>">
                <div class="card" style="padding: 10px;">
                    <div class="form-group">
                        <?php foreach ($jurusan as $dp) : ?>
                            <?php if ($dp['tingkat'] == 3 && $dp['jurusan'] == $dj['jurusan']) : ?>


                                <li class="mb-2">
                                    <a href="<?= base_url('nilai/prodi/' . $dp['id']); ?>">
                                        <p class="text-gray-800 " style="display: inline;"><?= $dp['prodi']; ?> - Semester <b class="text-<?= ($dp['semester'] == 'Ganjil') ? 'primary' : 'warning' ?>">
                                                <?= $dp['semester'] ?>
                                            </b></p>
                                    </a>
                                </li>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endforeach; ?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->