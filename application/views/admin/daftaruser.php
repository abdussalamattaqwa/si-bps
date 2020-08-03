<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3  text-gray-800"><?= $title; ?></h1>

    <a href="<?= base_url('admin/registration') ?>" class="btn btn-primary mb-3">Tambah User</a>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">JK</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                        <?php $i = 1; ?>
                        <?php foreach ($dataUser as $u) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $u["name"]; ?></td>
                                <td><?= $u["jk"]; ?></td>
                                <td><?= $u["username"]; ?></td>
                                <td><?= $u["email"]; ?></td>
                                <td><?= $u['role']; ?></td>
                                <td><?php
                                    switch ($u["is_active"]) {
                                        case 1:
                                            echo "aktif";
                                            break;
                                        default:
                                            echo "Tidak Aktif";
                                            break;
                                    }
                                    ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <?php if ($u['iduser'] != 1) : ?>
                                        <button href="" class="btn btn-success btn-sm editUser" data-toggle="modal" data-target="#editModal" title="Edit" data-nama="<?= $u["name"]; ?>" data-email="<?= $u["email"]; ?>" data-role="<?= $u["role_id"]; ?>" data-iduser="<?= $u["iduser"]; ?>" data-username="<?= $u['username']; ?>" data-jk="<?= $u["jk"]; ?>">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>

                                        <button href="" class="btn btn-danger btn-sm deleteUser" data-toggle="modal" title="Delete" data-target="#deleteModal" data-iduser="<?= $u["iduser"]; ?>" data-nama="<?= $u["name"]; ?>" data-image="<?= $u['image']; ?>" data-roleid="<?= $u['role_id']; ?>">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/edituser'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-user" id="idUser" name="idUser">
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="">

                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label>
                            Jenis Kelamin
                            <select name="jk" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                                </option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="2">Status
                                <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                        <?php endforeach; ?>
                        </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Aktif ?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit User</button>
                </div>
            </form>

        </div>
    </div>
</div>





<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Yakin ingin menghapus?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body teksHapus">Pilih tombol "hapus" jika anda ingin menghapus USER ini.</div>
            <div class="modal-footer">
                <form action="<?= base_url('admin/hapususer'); ?>" method="post">
                    <input type="hidden" name="idUser" class="id-user">
                    <input type="hidden" name="role_id" class="role_id">
                    <input type="hidden" name="image" class="image">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <Button type="submit" class="btn btn-primary">Hapus</Button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const editUser = document.querySelectorAll('.editUser');
    editUser.forEach(function(eu) {
        eu.addEventListener('click', function() {
            let jk = this.dataset.jk;

            const jkselect = document.querySelectorAll('select[name="jk"] option');
            jkselect.forEach(j => j.removeAttribute('selected'));

            if (jk == 'P') {
                jkselect[1].setAttribute('selected', '');
            } else {
                jkselect[0].setAttribute('selected', '');
            }

        })
    });

    const deleteUser = document.querySelectorAll('.deleteUser');
    // console.log(deleteUser);
    deleteUser.forEach(function(d) {
        d.addEventListener('click', function(dl) {
            const iIduser = document.querySelector('.id-user');
            const iImage = document.querySelector('.image');
            const iRoleid = document.querySelector('.role_id');

            let iduser = this.dataset.iduser;
            let image = this.dataset.image;
            let role_id = this.dataset.roleid;

            iRoleid.setAttribute('value', role_id);
            iIduser.setAttribute('value', iduser);
            iImage.setAttribute('value', image);
        })
    });
</script>