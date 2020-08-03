<?php

use phpDocumentor\Reflection\Types\This;
?>
<!-- Begin Page Content -->
<div class="container-fluid text-gray-800">

    <!-- Page Heading -->
    <h1 class="h3 mb-4"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-sm-8">

            <form method="post" action="<?= base_url('admin/registration') ?>">
                <div class="form-group">
                    <label>
                        Nama
                        <input size="100" type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        Username
                        <input size="100" type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>" autocomplete="off">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </label>
                </div>
                <div class=" form-group">
                    <label>
                        Email
                        <input size="100" type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </label>
                </div>

                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <label>
                            Jenis Kelamin
                            <select name="jk" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                                </option>
                            </select>
                        </label>
                    </div>

                    <div class="col-sm-6">
                        <label>
                            Status
                            <select name="role_id" id="role_id" class="form-control">
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id'] ?>" <?= ($r['id'] == 3) ? 'selected' : ''; ?>><?= $r['role'] ?></option>
                                <?php endforeach; ?>
                                </option>
                            </select>
                        </label>
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




                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Aktif ?
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user ">
                    Tambahkan User
                </button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->