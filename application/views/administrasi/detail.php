<div class="row">

    <div class="col-lg-6">
        <div class="form-group row">

            <div class="offset-sm-3">

                <?php if ($allow) { ?>
                    <img style="max-height: 168px; min-height: 100px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                <?php } else { ?>
                    <img style="max-height: 168px; min-height: 100px;" src="<?= base_url('assets/img/profile/') . 'defaultp.jpg'; ?>" class="img-thumbnail">
                <?php } ?>

            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-2 col-form-label">Nama</label>
            <div class="col-sm-12">
                <input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-2 col-form-label">Usename</label>
            <div class="col-sm-12">
                <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-2 col-form-label">Email</label>
            <div class="col-sm-12">
                <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" readonly>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group row">
            <label class="col-4 col-form-label"><?= ($status == 'dosen') ? 'NIP' : 'NIM'; ?></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" value="<?= $user[($status == 'dosen') ? 'nip' : 'nim']; ?>" readonly>
            </div>
        </div>

        <?php if ($status == 'tutor') : ?>

            <div class="form-group row">
                <label for="telp" class="col-4 col-form-label">Prodi</label>
                <div class="col-sm-12">
                    <input type="text" name="telp" class="form-control" value="<?= $user['prodi']; ?>" readonly>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group row">
            <label for="telp" class="col-4 col-form-label">No. Telephone</label>
            <div class="col-sm-12">
                <input type="text" name="telp" class="form-control" value="<?= $user['telp']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="jk" class="col-4 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-12">
                <input type="text" name="jk" class="form-control" value="<?= $user['jk']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-4 col-form-label">Alamat</label>
            <div class="col-sm-12">
                <input type="text" name="alamat" class="form-control" value="<?= $user['alamat']; ?>" readonly>
            </div>
        </div>
    </div>
</div>