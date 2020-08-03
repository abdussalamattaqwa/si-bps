<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pilih Fakultas</h1>

    <a href="" class="btnTambahFakultas btn btn-primary mb-3" data-toggle="modal" data-target="#Modal">Tambah Fakultas</a>
    <?= $this->session->flashdata('message'); ?>

    <style>
        .row .col-lg-8 a .card:hover {
            background-color: #efefef;
        }
    </style>

    <div class="row">
        <div class="col-lg-8">
            <table class="table table-hover text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($fakultas as $f) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $f['fakultas']; ?></td>
                            <td data-nama="<?= $f['fakultas']; ?>">
                                <a href=" <?= base_url('administrasi/fakultas/' . $f['fakultas']); ?>" class="btn btn-primary btn-sm"> <i class="fas fa-fw fa-mouse-pointer"></i> Pilih
                                </a>
                                <a href="" class="ubahFakultas btn btn-success btn-sm" data-toggle="modal" data-target="#Modal" data-id="<?= $f['id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
                                <a href="" class="hapusFakultas btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal"> <i class="fas fa-fw fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal-->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely">Tambah Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn-modal btn btn-primary">Tambah</button>
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
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
                <br>
                <br>
                <div class="alert alert-danger">Semua data <b>mahasiswa</b> di fakultas ini akan terhapus</div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                <a class="btn btn-danger" id="deleteButton">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const modalLabel = document.getElementById('Modal-Labely');
    const modalForm = document.getElementById('modal-form');
    const formInput = document.querySelector('.formInput');
    const btnModal = document.querySelector('.btn-modal');


    function modal(TmodalLabel, TmodalForm, TformInput, TbtnModal) {
        modalLabel.textContent = TmodalLabel;
        modalForm.setAttribute('action', TmodalForm);
        formInput.setAttribute('name', TformInput);
        btnModal.textContent = TbtnModal;
    }

    const btnTambahFakultas = document.querySelector(".btnTambahFakultas");
    btnTambahFakultas.addEventListener('click', function() {
        modal('Tambah Fakultas',
            '<?= base_url("administrasi/tambahFakultas"); ?>',
            'fakultas',
            'Tambah Fakultas');
        formInput.setAttribute('value', '');
    });

    const btnUbahFakultas = document.querySelectorAll(".ubahFakultas");

    for (btnUF of btnUbahFakultas) {
        btnUF.addEventListener('click', function() {
            const nama = this.parentElement.dataset.nama;
            modal('Ubah Fakultas',
                `<?= base_url("administrasi/ubahFakultas/"); ?>${nama}`,
                'fakultas',
                'Ubah Fakultas');
            formInput.setAttribute('value', nama);
        });
    }

    const btnHapusFakultas = document.querySelectorAll(".hapusFakultas");
    for (btnHF of btnHapusFakultas) {
        btnHF.addEventListener('click', function() {
            const fakultas = this.parentElement.dataset.nama;
            modal('Hapus Fakultas',
                `<?= base_url("administrasi/hapusfakultas/"); ?>${fakultas}`,
                'fakultas',
                'Hapus Fakultas');
            const deleteModal = document.getElementById('deleteButton');

            deleteModal.setAttribute(
                'href',
                `<?= base_url("administrasi/hapusfakultas/") ?>${fakultas}`);
        });
    }
</script>