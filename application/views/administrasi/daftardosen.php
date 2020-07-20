<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('Dosen/tambah_dosen'); ?>" class="btn btn-primary mb-3" id="btnTambahDosen">Tambah Dosen</a>

    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tutor</h6> 
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dosen as $dtDosen) : ?>
                            <tr>
                                <th scope="row"> <?= $i; ?> </th>
                                <td><?= $dtDosen['nip']; ?></td>
                                <td><?= $dtDosen['name']; ?></td>
                                <td><?= $dtDosen['role']; ?></td>
                                <td data-id="<?= $dtDosen['id']; ?>" data-idUser="<?= $dtDosen['id_user']; ?>">
                                    <!-- Tombol Edit -->
                                    <a href="" class="badge badge-primary detail-dosen" data-toggle="modal" data-target="#ModalDetail">Detail</a>

                                    <?php if ($user['id'] != $dtDosen['id_user']) : ?>
                                        <a href="<?= base_url('Dosen/edit_dosen/' . $dtDosen['id_user'] . '/' . $dtDosen['id']); ?>" class="badge badge-success editDosen">Edit</a>

                                        <a href="" class=" badge badge-danger deleteDosen" data-toggle="modal" data-target="#hapusModal">Delete
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php $i++;
                        endforeach; ?>
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
                <h5 class="modal-title" id="Modal-Labely-Detail">Detail Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form-detail" action="">
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
    const deleteButton = document.getElementById('deleteButton');
    const deleteDosen = document.querySelectorAll('.deleteDosen');
    for (dDosen of deleteDosen) {
        dDosen.addEventListener('click', function() {

            let id_user = this.parentElement.dataset.iduser;
            let id = this.parentElement.dataset.id;
            // console.log(`id_user = ${id_user} ------ id = ${id}`);
            deleteButton.setAttribute('href', `<?= base_url('dosen/hapusDosen/'); ?>${id_user}/${id}`);
        });
    }



    const detailDosen = document.querySelectorAll('.detail-dosen');
    for (dtlDosen of detailDosen) {
        dtlDosen.addEventListener('click', function() {
            const modalBody = document.querySelector('#modal-form-detail .modal-body');
            let id_user = this.parentElement.dataset.iduser;
            fetch(`<?= base_url('dosen/detail_dosen/') ?>${id_user}`)
                .then((r) => r.text())
                .then((r) => modalBody.innerHTML = r);
        });

    }
</script>