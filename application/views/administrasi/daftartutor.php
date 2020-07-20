<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row text-gray-900">
        <div class="col-lg-2">
            <a href="<?= base_url('Tutor/tambah_tutor'); ?>" class="btn btn-primary mb-3">Tambah Tutor</a>
        </div>

        <?php if ($status == 'dosen') : ?>
            <label class="col-lg-2 col-form-label ">Jenis Kelamin</label>
            <div class="col-lg-2">
                <select name="jk" id="" class="form-control select_jk">
                    <option value="L" <?= ($jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="P" <?= ($jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <br>
            <br>
        <?php endif; ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tutor as $dtTutor) : ?>
                            <tr>
                                <th scope="row"> <?= $i; ?> </th>
                                <td><?= $dtTutor['nim']; ?></td>
                                <td><?= $dtTutor['name']; ?></td>
                                <td><?= $dtTutor['role']; ?></td>
                                <td><?= $dtTutor['fakultas']; ?></td>
                                <td data-id="<?= $dtTutor['id']; ?>" data-idUser="<?= $dtTutor['id_user']; ?>">
                                    <!-- Tombol Edit -->
                                    <a href="" class="badge badge-primary detail-tutor" data-toggle="modal" data-target="#ModalDetail">Detail</a>
                                    <a href="<?= base_url('Tutor/edit_tutor/' . $dtTutor['iduser']); ?>" class="badge badge-success">Edit</a>

                                    <?php if ($dtTutor['iduser'] != $user['id']) : ?>
                                        <a href="" class=" badge badge-danger delete-tutor" data-toggle="modal" data-target="#hapusModal">Delete
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



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



<!-- Modal Detail -->
<div class=" modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely-Detail" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely-Detail">Detail Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form-detail">
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <!-- <button type="submit" class="btn-modal btn btn-primary">Edit -->
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>



<script>
    const detailTutor = document.querySelectorAll('.detail-tutor');
    detailTutor.forEach(function(dt) {
        dt.addEventListener('click', function() {
            const modalBody = document.querySelector('#modal-form-detail .modal-body');
            let id_user = this.parentElement.dataset.iduser;
            fetch(`<?= base_url('tutor/detail_tutor/') ?>${id_user}`)
                .then((r) => r.text())
                .then((r) => modalBody.innerHTML = r);
        });
    });

    const deleteTutor = document.querySelectorAll('.delete-tutor');
    const deleteButton = document.getElementById('deleteButton');
    deleteTutor.forEach(function(delT) {
        delT.addEventListener('click', function() {
            let id_user = this.parentElement.dataset.iduser;
            let id_tutor = this.parentElement.dataset.id;
            // console.log(`id_user = ${id_user} ------ id = ${id}`);
            deleteButton.setAttribute('href', `<?= base_url('tutor/hapus/'); ?>${id_user}/${id_tutor}`);
        });
    });

    const select_jk = document.querySelector('.select_jk');
    select_jk.addEventListener('change', function() {
        let jk = select_jk.selectedOptions[0].value;
        window.open(`?jk=${jk}`, '_self');
    })
    // console.log(select_jk);
</script>