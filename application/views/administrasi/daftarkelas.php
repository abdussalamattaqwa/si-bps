<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Program Studi</h1>

    <a href="" class="btnTambahFakultas btn btn-primary mb-3" data-toggle="modal" data-target="#Modal">Tambah Fakultas</a>
    <?= $this->session->flashdata('message'); ?>

    <?php foreach ($daftar_kelas as $df) : ?>
        <?php if ($df['tingkat'] == 1) : ?>
            <div>
                <div class="col-sm-8">

                    <h3 class="text-gray-800 border-left-primary" style="display: inline;">&nbsp <?= $df['fakultas']; ?> </h3>
                    <div class="dropdown" style="display: inline;">
                        <button class="badge badge-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" data-nama="<?= $df['fakultas']; ?>">
                            <a href="" class=" ubahFakultas dropdown-item" data-toggle="modal" data-target="#Modal" data-id="<?= $df['id']; ?>" data-nama="<?= $df['fakultas']; ?>"> Ubah </a>
                            <a href="" class="tambahJurusan dropdown-item" data-toggle="modal" data-target="#Modal"> Tambah Jurusan </a>
                            <a href="" class="hapusFakultas dropdown-item" data-toggle="modal" data-target="#hapusModal"> Hapus </a>
                        </div>
                    </div>
                    <br>

                    <?php foreach ($daftar_kelas as $dj) : ?>
                        <?php if ($dj['tingkat'] == 2 && $dj['fakultas'] == $df['fakultas']) : ?>
                            <br>

                            <h4 class="text-gray-800 ml-4 mt-5 border-left-info" style="display: inline;"> &nbsp <?= $dj['jurusan']; ?></h4>

                            <div class="dropdown" style="display: inline;">
                                <button class="badge badge-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" data-nama="<?= $dj['jurusan']; ?>" data-id="<?= $dj['id']; ?>" data-fakultas="<?= $dj['fakultas']; ?>">
                                    <a href="" class="ubahJurusan dropdown-item" data-toggle="modal" data-target="#Modal"> Ubah Jurusan</a>
                                    <a href="" class="tambahProdi dropdown-item" data-toggle="modal" data-target="#Modal"> Tambah Program Studi</a>
                                    <a href="" class="hapusJurusan dropdown-item" data-toggle="modal" data-target="#hapusModal"> Hapus </a>
                                </div>
                            </div>
                            <br>
                            <br>

                            <?php foreach ($daftar_kelas as $dp) : ?>
                                <?php if ($dp['tingkat'] == 3 && $dp['jurusan'] == $dj['jurusan']) : ?>


                                    <ul>
                                        <li class="blue" data-id=<?= $dp['id']; ?> data-prodi="<?= $dp['prodi']; ?>">

                                            <a href=" <?= base_url('administrasi/daftarkelas/' . $dp["id"]); ?>">
                                                <h5 class="text-gray-800 " style="display: inline;"><?= $dp['prodi']; ?></h5>
                                            </a>
                                            <a href="#" class="btn btn-warning btn-circle ubahProdi" data-toggle="modal" data-target="#Modal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-circle hapusProdi" data-toggle="modal" data-target="#hapusModal">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </li>
                                    </ul>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
            <br>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Edit -->
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
            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
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
    });

    const btnUbahFakultas = document.querySelectorAll(".ubahFakultas");

    for (btnUF of btnUbahFakultas) {
        btnUF.addEventListener('click', function() {
            // const idFakultas = this.dataset.id;
            const nama = this.parentElement.dataset.nama;
            modal('Ubah Fakultas',
                `<?= base_url("administrasi/ubahFakultas/"); ?>${nama}`,
                'fakultas',
                'Ubah Fakultas');
            formInput.setAttribute('value', nama);
        });
    }

    const btnTambahJurusan = document.querySelectorAll('.tambahJurusan');

    for (btnTJ of btnTambahJurusan) {
        btnTJ.addEventListener('click', function() {
            const fakultas = this.parentElement.dataset.nama;
            modal('Tambah Jurusan',
                `<?= base_url("administrasi/tambahjurusan/"); ?>${fakultas}`,
                'jurusan',
                'Tambah Jurusan');
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

    const ubahJurusan = document.querySelectorAll('.ubahJurusan');
    for (btnUJ of ubahJurusan) {
        btnUJ.addEventListener('click', function() {
            const jurusan = this.parentElement.dataset.nama;
            const id = this.parentElement.dataset.id;
            modal('Ubah Jurusan',
                `<?= base_url("administrasi/ubahjurusan/"); ?>${id}`,
                'jurusan',
                'Ubah Jurusan');
            formInput.setAttribute('value', jurusan);
        });
    }

    const tambahProdi = document.querySelectorAll('.tambahProdi');
    for (btnTP of tambahProdi) {
        btnTP.addEventListener('click', function() {
            const fakultas = this.parentElement.dataset.fakultas;
            const jurusan = this.parentElement.dataset.nama;
            modal('Tambah Prodi',
                `<?= base_url("administrasi/tambahprodi/"); ?>${fakultas}/${jurusan}`,
                'prodi',
                'Tambah Prodi');
        });
    }

    const btnHapusJurusan = document.querySelectorAll(".hapusJurusan");
    for (btnHJ of btnHapusJurusan) {
        btnHJ.addEventListener('click', function() {
            const id = this.parentElement.dataset.id;
            modal('Hapus Jurusan',
                `<?= base_url("administrasi/hapusjurusan/"); ?>${id}`,
                'jurusan',
                'Hapus Jurusan');
            const deleteModal = document.getElementById('deleteButton');
            deleteModal.setAttribute(
                'href',
                `<?= base_url("administrasi/hapusjurusan/") ?>${id}`);
        });
    }


    const ubahProdi = document.querySelectorAll('.ubahProdi');
    for (btnUP of ubahProdi) {
        btnUP.addEventListener('click', function() {
            const id = this.parentElement.dataset.id;
            const prodi = this.parentElement.dataset.prodi;

            modal('Ubah Prodi',
                `<?= base_url("administrasi/ubahprodi/"); ?>${id}`,
                'prodi',
                'Ubah Prodi');
            formInput.setAttribute('value', prodi);
        });
    }

    const btnHapusProdi = document.querySelectorAll(".hapusProdi");
    for (btnHP of btnHapusProdi) {
        btnHP.addEventListener('click', function() {
            const id = this.parentElement.dataset.id;
            modal('Hapus Prodi',
                `<?= base_url("administrasi/hapusprodi/"); ?>${id}`,
                'prodi',
                'Hapus Prodi');
            const deleteModal = document.getElementById('deleteButton');
            deleteModal.setAttribute(
                'href',
                `<?= base_url("administrasi/hapusprodi/") ?>${id}`);
        });
    }
</script>