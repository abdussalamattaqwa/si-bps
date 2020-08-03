<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="alert alert-warning" role="alert">Apabila data sub menu diubah, maka code programnya juga <b>harus</b> diubah <br>
        <b>Kecuali untuk data <i> <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> icon</a> dan active</i></b></div>

    <div class="col-lg">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Submenu</a>
        <table class="table table-hover text-gray-900 table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-900">
                <?php $i = 1; ?>
                <?php foreach ($subMenu as $sm) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?php if ($sm['is_active'] == 1) {
                                echo 'Aktif';
                            } else {
                                echo 'Tidak';
                            } ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="" class="btn btn-success btn-sm editSubMenu" data-toggle="modal" data-target="#EditModal" data-id=<?= $sm['id']; ?> title="Edit"><i class="fas fa-fw fa-edit"></i> Edit</a>

                            <!-- Tombol Delete -->
                            <a href="" class="btn btn-danger btn-sm deleteSubMenu" data-id="<?= $sm['id']; ?>" data-toggle="modal" data-target="#hapusModal" title="Delete"><i class="fas fa-fw fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>
</div>
<!-- <div class="row">
</div> -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu title">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu
                                <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                        </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_ctive">
                                Active ?
                            </label>
                        </div>
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






<!-- Modal Edit -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Edit Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu title">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu
                                <?php foreach ($menu as $m) : ?>
                            <option data-menu="<?= $m['menu'] ?>" value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                        </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_ctive">
                                Active ?
                            </label>
                        </div>
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
    const mfe = document.getElementById('modal-form-edit');
    const mfeTitle = document.querySelector('#modal-form-edit input[name="title"]');
    const mfeURL = document.querySelector('#modal-form-edit input[name="url"]');
    const mfeIcon = document.querySelector('#modal-form-edit input[name="icon"]');
    const mfeOptionMenu = document.querySelectorAll('#modal-form-edit option');
    const mfeCheck = document.querySelector('#modal-form-edit #is_active');

    const deleteButton = document.getElementById('deleteButton');

    const edtSubMenuBadge = document.querySelectorAll('.editSubMenu');
    edtSubMenuBadge.forEach(function(dtSB) {
        dtSB.addEventListener('click', function() {
            let aktif = this.parentElement.previousElementSibling.innerHTML;
            let icon = this.parentElement.previousElementSibling.previousElementSibling.innerHTML;
            let url = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
            let menu = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
            let title = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
            let id = this.dataset.id;

            mfe.setAttribute('action', `<?= base_url('menu/editSubMenu/'); ?>${id}`);

            mfeTitle.setAttribute('value', title);
            mfeURL.setAttribute('value', url);
            mfeIcon.setAttribute('value', icon);


            mfeOptionMenu.forEach(function(om) {
                om.removeAttribute('selected');
            })
            let mfeMenu = document.querySelector(`#modal-form-edit option[data-menu="${menu}"]`);
            mfeMenu.setAttribute('selected', '');

            mfeCheck.removeAttribute('checked');
            console.log(aktif);


            if (aktif == 'Aktif')
                mfeCheck.setAttribute('checked', '');
        })
    })

    const deleteSubMenuBadge = document.querySelectorAll('.deleteSubMenu');
    deleteSubMenuBadge.forEach(function(dl) {
        dl.addEventListener('click', function() {
            let id = this.dataset.id;
            deleteButton.setAttribute('href', `<?= base_url('menu/deleteSubmenu/'); ?>${id}`)
        })
    })
</script>