<?php foreach ($halaqah as $h) : ?>

    <div class="card shadow mt-4 col-sm-5 ml-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelas <?= $h['kelas']; ?></h6>
        </div>
        <div class="card-body">
            <p class="card-text">Halaqah <?= $h['level']; ?>.</p>
            <a href="<?= base_url('binaan/nilai/' . $h['id']); ?>" class="btn btn-primary">Pilih</a>
        </div>
    </div>
<?php endforeach; ?>