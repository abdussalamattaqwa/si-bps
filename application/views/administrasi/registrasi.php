<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input size="100" type="text" class="form-control form-control-user" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input size="100" type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>" autocomplete="off">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input size="100" type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <?php if ($status == 'dosen') : ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jk" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                                </option>
                            </select>
                        </div>
                    </div>
                <?php else : ?>
                    <input type="hidden" name="jk" value="<?= $user['jk']; ?>">
                <?php endif; ?>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="role_id" id="role_id" class="form-control">
                            <?php foreach ($role as $r) : ?>
                                <option <?= ($r['id'] == 6 || $r['id'] == 8) ? 'selected' : ''; ?> value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php endforeach; ?>
                            </option>
                        </select>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                            Password
                            <input size="100" type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <label>
                            Ulangi Password
                            <input size="100" type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <?php if ($status == 'dosen') { ?>
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    <?php } else { ?>
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM" value="">
                            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                </div>



                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <select name="prodi" class="form-control">
                            <?php foreach ($prodi as $dp) : ?>
                                <option value="<?= $dp['id']; ?>"><?= $dp['prodi']; ?></option>
                            <?php endforeach; ?>
                            </option>
                        </select>
                    </div>

                <?php } ?>
                </div>
                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">No. Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="No. Telephone" value="">
                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Aktif ?
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user ">
                    Tambahkan <?= ($status == 'dosen') ? "Dosen" : "Tutor"; ?>
                </button>
            </form>

        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->