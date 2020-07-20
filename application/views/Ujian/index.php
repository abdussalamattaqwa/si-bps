<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <style>
        .row .col-lg-8 a .card:hover {
            background-color: #efefef;
        }
    </style>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($fakultas as $f) : ?>
                <a href="<?= base_url('ujian/fakultas/' . $f['fakultas']); ?>">
                    <div class="card mb-4 py-3 border-bottom-primary text-gray-900">
                        <div class="card-body">
                            <?= $f['fakultas']; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->