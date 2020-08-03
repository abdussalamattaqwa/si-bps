<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <div class="alert alert-warning" role="alert">Apabila menu diubah, maka code programnya juga <b>harus</b> diubah</div>
        <br>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Menu</a>
        <table class="table table-hover text-gray-900">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $m) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td data-menu="<?= $m['menu']; ?>" data-id="<?= $m['id']; ?>">
                            <a href="" class="btn btn-success btn-sm aEditMenu" data-toggle="modal" data-target="#editMenuModal" title="Edit"><i class="fas fa-fw fa-edit"></i> Edit</a>
                            <?php if ($m['id'] != 1) : ?>
                                <a href="" class="btn btn-danger btn-sm delete-menu-badge" data-toggle="modal" data-target="#hapusModal" title="Delete"><i class="fas fa-fw fa-trash"></i> Delete</a>
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
<div class="row">
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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


<!-- Modal Edit-->
<div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="editFormMenu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
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
                <a class="btn btn-danger text-gray-100" id="deleteButton">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const editInputMenu = document.getElementById('editFormMenu');
    const formEditModal = document.querySelector('#editMenuModal form');


    const aEditMenu = document.querySelectorAll('.aEditMenu');
    for (eMenu of aEditMenu) {
        eMenu.addEventListener('click', function() {
            let menuName = this.parentElement.dataset.menu;
            let idMenu = this.parentElement.dataset.id;
            editInputMenu.setAttribute('value', menuName);
            formEditModal.setAttribute('action', `<?= base_url('menu/editMenu/'); ?>${idMenu}`);

        });
    }

    const deleteButton = document.getElementById('deleteButton');
    const deleteMenuBadge = document.querySelectorAll('.delete-menu-badge');
    for (dMenu of deleteMenuBadge) {
        dMenu.addEventListener('click', function() {
            idMenu = this.parentElement.dataset.id;
            deleteButton.setAttribute('href', `<?= base_url('menu/deleteMenu/'); ?>${idMenu}`);
        });
    }
</script>