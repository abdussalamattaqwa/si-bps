<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
        <table class="table table-hover table-responsive text-gray-900">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-900">
                <?php $i = 1; ?>
                <?php foreach ($role as $r) : ?>

                    <tr>
                        <th scope="row"><?= $r['id']; ?></th>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                            <a href="" class="badge badge-success editRole" data-toggle="modal" data-target="#editRoleModal" data-id=<?= $r['id']; ?> data-nama="<?= $r['role']; ?>">edit</a>
                            <?php if ($r['id'] != 1) : ?>
                                <a href="" class=" badge badge-danger deleteRole" data-toggle="modal" data-target="#hapusModal" data-id="<?= $r['id']; ?>">delete</a>
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


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahRole'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Hapus Data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                <a class="btn btn-danger" id="deleteButton">Hapus</a>
            </div>
        </div>
    </div>
</div>






<!-- Modal Edit -->
<!-- Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("admin/editrole"); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idEditRole" name="roleId">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="editRole" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const btnEditRole = document.querySelectorAll(".editRole");
    btnEditRole.forEach(btn => {
        btn.addEventListener('click', function() {
            const idRole = this.dataset.id;
            const nama = this.dataset.nama;
            const inputEditRole = document.getElementById("editRole");
            inputEditRole.setAttribute('value', nama);
            const inputIdEditROle = document.getElementById("idEditRole");
            inputIdEditROle.setAttribute('value', idRole);

        })
    });

    const deleteButton = document.getElementById('deleteButton');
    const btnDelete = document.querySelectorAll('.deleteRole');
    btnDelete.forEach(btn => {
        btn.addEventListener('click', function() {
            idRole = this.dataset.id;
            deleteButton.setAttribute('href', `<?= base_url('admin/hapusRole'); ?>/${idRole}`)
        });
    });
</script>