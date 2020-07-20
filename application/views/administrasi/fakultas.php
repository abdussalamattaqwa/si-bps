<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Prodi di Fakultas <?= $fakultas; ?></h1>
    <a href="" class="tambahJurusan btn btn-primary mb-3" data-toggle="modal" data-target="#Modal">Tambah Jurusan</a>
    <?= $this->session->flashdata('message'); ?>

    <?php foreach ($jurusan as $dj) : ?>
        <?php if ($dj['tingkat'] == 2) : ?>
            <div class="mb-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $dj['jurusan']; ?>
                    </button>

                    <div class="dropdown-menu" data-nama="<?= $dj['jurusan']; ?>" data-id="<?= $dj['id']; ?>" data-fakultas="<?= $dj['fakultas']; ?>">
                        <a href="" class="tambahProdi dropdown-item" data-toggle="modal" data-target="#Modal"> Tambah Program Studi</a>
                        <div class="dropdown-divider"></div>
                        <a href="" class="ubahJurusan dropdown-item" data-toggle="modal" data-target="#Modal"> Edit Jurusan</a>
                        <a href="" class="hapusJurusan dropdown-item" data-toggle="modal" data-target="#hapusModal"> Hapus </a>
                    </div>
                </div>

            </div>
            <?php foreach ($daftar_prodi as $dp) : ?>
                <?php if ($dp['tingkat'] == 3 && $dp['jurusan'] == $dj['jurusan']) : ?>
                    <ul>
                        <li>
                            <a href="<?= base_url('administrasi/Daftarkelas/' . $dp['id']); ?>">
                                <h5 class="text-gray-800 " style="display: inline;"><?= $dp['prodi']; ?> - Semester <b class="text-<?= ($dp['semester'] == 'Ganjil') ?
                                                                                                                                        'primary' : 'warning' ?>">
                                        <?= $dp['semester'] ?>
                                    </b>
                                </h5>
                            </a>
                            <div class="btn-group ml-4">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" data-id=<?= $dp['id']; ?> data-prodi="<?= $dp['prodi']; ?>" data-semester="<?= $dp['semester']; ?>" data-jmlkelas="<?= $dp['jumlah_kelas']; ?>">
                                    <a href="" class="dropdown-item ubahSemester" data-toggle="modal" data-target="#ModalSemester"> Edit Semester</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="" class="dropdown-item ubahProdi" data-toggle="modal" data-target="#Modal"> Edit Prodi</a>
                                    <a href="" class="dropdown-item hapusProdi" data-toggle="modal" data-target="#hapusModal"> Hapus </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php endif; ?>

    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal-->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely">Tambah Jurusan</h5>
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

<!-- Modal Semester-->
<div class="modal fade" id="ModalSemester" tabindex="-1" role="dialog" aria-labelledby="Modal-Semester-Labely" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Semester-Labely">Edit Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form" action="<?= base_url('administrasi/ubahSemester/' . $fakultas); ?>">
                <div class="modal-body">
                    <input type="hidden" name="prodi">
                    <div class="form-group">
                        <select class="form-control" name="semester">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn-modal btn btn-primary">Edit Semester</button>
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
                <div class="pesan"></div>
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

    const ubahSemester = document.querySelectorAll('.ubahSemester');
    ubahSemester.forEach(function(u) {
        u.addEventListener('click', function() {
            let prodi = this.parentElement.dataset.prodi;

            try {

                let semester = this.parentElement.dataset.semester;
                let selectS = document.querySelector(`#ModalSemester select option[value=${semester}]`);
                selectS.setAttribute('selected', '');
            } catch (e) {

            }

            let fProdi = document.querySelector(`#ModalSemester input[name="prodi"]`);
            fProdi.setAttribute('value', prodi);
        });
    })


    function modal(TmodalLabel, TmodalForm, TformInput, TbtnModal) {
        modalLabel.textContent = TmodalLabel;
        modalForm.setAttribute('action', TmodalForm);
        formInput.setAttribute('name', TformInput);
        btnModal.textContent = TbtnModal;
    }


    const btnTambahJurusan = document.querySelector('.tambahJurusan');
    btnTambahJurusan.addEventListener('click', function() {
        modal('Tambah Jurusan',
            `<?= base_url("administrasi/tambahjurusan/" . $fakultas); ?>`,
            'jurusan',
            'Tambah Jurusan');
    });



    const ubahJurusan = document.querySelectorAll('.ubahJurusan');
    for (btnUJ of ubahJurusan) {
        btnUJ.addEventListener('click', function() {
            const jurusan = this.parentElement.dataset.nama;
            const id = this.parentElement.dataset.id;
            modal('Ubah Jurusan',
                `<?= base_url("administrasi/ubahjurusan/" . $fakultas); ?>/${jurusan}/${id}`,
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
            const jurusan = this.parentElement.dataset.nama;
            const pesan = document.querySelector('#hapusModal .pesan');
            pesan.innerHTML = '';
            pesan.innerHTML = `
                    <div class="alert alert-danger">Semua data <b>mahasiswa</b> dijurusan ini akan terhapus</div>
                `;
            modal('Hapus Jurusan',
                `<?= base_url("administrasi/hapusjurusan/"); ?>${id}`,
                'jurusan',
                'Hapus Jurusan');

            const deleteModal = document.getElementById('deleteButton');
            deleteModal.setAttribute(
                'href',
                `<?= base_url("administrasi/hapusjurusan/" . $fakultas) ?>/${jurusan}`);
        });
    }


    const ubahProdi = document.querySelectorAll('.ubahProdi');
    for (btnUP of ubahProdi) {
        btnUP.addEventListener('click', function() {
            const id = this.parentElement.dataset.id;
            const prodi = this.parentElement.dataset.prodi;

            modal('Ubah Prodi',
                `<?= base_url("administrasi/ubahprodi/" . $fakultas); ?>/${id}`,
                'prodi',
                'Ubah Prodi');
            formInput.setAttribute('value', prodi);
        });
    }

    const btnHapusProdi = document.querySelectorAll(".hapusProdi");
    for (btnHP of btnHapusProdi) {
        btnHP.addEventListener('click', function() {
            const pesan = document.querySelector('#hapusModal .pesan');
            pesan.innerHTML = '';

            const id = this.parentElement.dataset.id;
            const jumlah_kelas = this.parentElement.dataset.jmlkelas;

            modal('Hapus Prodi',
                `<?= base_url("administrasi/hapusprodi/"); ?>${id}`,
                'prodi',
                'Hapus Prodi');


            if (jumlah_kelas > 0) {
                pesan.innerHTML = `
                    <div class="alert alert-danger">Semua data <b>mahasiswa</b> diprodi ini akan terhapus</div>

                    <div class="alert alert-warning">Terdapat <b>${jumlah_kelas}</b> kelas yang akan dihapus bersama data mahasiswanya</div>
                `;
            }
            const deleteModal = document.getElementById('deleteButton');
            deleteModal.setAttribute(
                'href',
                `<?= base_url("administrasi/hapusprodi/" . $fakultas) ?>/${id}`);
        });
    }
</script>