<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 ">Daftar Mahasiswa</h1>

    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
            <input type="text" name="kelas" class=" form-control" value="<?= $kelas['kelas']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Semester</label>
        <div class="col-sm-6">
            <input type="text" name="kelas" class=" form-control" value="<?= $kelas['semester']; ?>" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="jk" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-6">
            <input type="text" name="jk" class=" form-control" value="<?= ($user['jk'] == 'L') ? 'Ikhwan' : 'Akhwat' ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
        <div class="col-sm-6">
            <input type="text" name="angkatan" class=" form-control" value="<?= $angkatan; ?>" readonly>
        </div>
    </div>


    <a href="" class="btn btn-primary mb-3 btn-tambah-mhs" data-toggle="modal" data-target="#ModalTambah">Tambah Mahasiswa</a>

    <?= $this->session->flashdata('message'); ?>


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Pre Test</th>
                            <th scope="col">Final Test</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tabel_body_mhs">
                        <?php $i = 1;
                        foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $mhs['nim']; ?></td>
                                <td><?= $mhs['nama']; ?></td>
                                <td><?= $mhs['telp']; ?></td>
                                <td class="text-center">
                                    <?php if ($mhs['pre_test'] == null) {
                                        $mhs['pre_test'] = 0;
                                        $proses = "new";
                                    } else {
                                        $proses = "update";
                                    } ?>
                                    <a href="<?= base_url('ujian/test/pre_test/' . $proses . '/' . $kelas['id'] . '/' . $mhs['id']); ?>" class="btn btn-primary"><?= $mhs['pre_test']; ?></a>
                                </td>
                                <td class="text-center">
                                    <?php if ($mhs['final_test'] == null) $mhs['final_test'] = 0;  ?>

                                    <a href="<?= base_url('ujian/test/final_test/' . $proses . '/' . $kelas['id'] . '/' . $mhs['id']); ?>" class="btn btn-primary"><?= $mhs['final_test']; ?></a>
                                </td>
                                <td data-idmahasiswa="<?= $mhs['id']; ?>" data-jk="<?= $mhs['jk']; ?>" data-angkatan="<?= $mhs['angkatan']; ?>">
                                    <a href="" class="badge badge-success edit-mahasiswa" data-toggle="modal" data-target="#ModalEdit">Edit</a>

                                    <a href="" class=" badge badge-danger delete-mahasiswa" data-toggle="modal" data-target="#hapusModal">Delete</a>
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

<!-- Modal Tambah-->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely-tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely-tambah">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form-tambah" action="<?= base_url('ujian/tambahMahasiswa/' . $kelas['id']); ?>">
                <div class="modal-body">
                    <input type="hidden" name="jk" value="<?= $user['jk']; ?>">
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user" placeholder="NIM" name="nim" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user" placeholder="Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user" placeholder="Telp" name="telp">
                    </div>
                    <div class="form-group">
                        Angkatan
                        <input type="text" class="formInput form-control form-control-user" placeholder="Angkatan" name="angkatan" readonly>
                    </div>
                    <div class="form-group">
                        Kelas
                        <input type="text" class="formInput form-control form-control-user" placeholder="Kelas" name="kelas" value="<?= $kelas['kelas']; ?>" readonly>
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


<!-- Modal Edit -->
<div class=" modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely-Edit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely-Edit">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        NIM
                        <input type="text" class="formInput form-control form-control-user" placeholder="NIM" name="nim">
                    </div>
                    <div class="form-group">
                        Nama
                        <input type="text" class="formInput form-control form-control-user" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
                        No.Telp
                        <input type="text" class="formInput form-control form-control-user" placeholder="Telp" name="telp">
                    </div>
                    <div class="form-group">
                        Angkatan
                        <input type="text" class="formInput form-control form-control-user" placeholder="Angkatan" name="angkatan" readonly>
                    </div>
                    <div class="form-group">
                        Kelas
                        <input type="text" class="formInput form-control form-control-user" placeholder="Kelas" name="kelas" value="<?= $kelas['kelas']; ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn-modal btn btn-primary">Edit
                    </button>
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
    const btnTMhs = document.querySelector('.btn-tambah-mhs');
    const sAngkatan = document.querySelector('.select_angkatan');
    let pilihanAngkatan = <?= $angkatan; ?>;
    btnTMhs.addEventListener('click', function() {
        const iAngkatan = document.querySelector('#ModalTambah input[name="angkatan"]');
        iAngkatan.setAttribute('value', pilihanAngkatan);
    });

    const editMahasiswa = document.querySelectorAll('.edit-mahasiswa');
    const deleteMahasiswa = document.querySelectorAll('.delete-mahasiswa');

    // const mseJK = mfe.querySelectorAll('select[name="jk"] option');


    editMahasiswa.forEach(em => {
        em.addEventListener('click', function() {


            let id_mahasiswa = this.parentElement.dataset.idmahasiswa;
            let jk = this.parentElement.dataset.jk;
            let angkatan = this.parentElement.dataset.angkatan;
            let nim = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
            let nama = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
            let telp = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;


            const mfe = document.getElementById('modal-form-edit');
            const mfeNim = mfe.querySelector('input[name="nim"]');
            const mfeNama = mfe.querySelector('input[name="nama"]');
            const mfeTelp = mfe.querySelector('input[name="telp"]');
            const mfeAngkatan = mfe.querySelector('input[name="angkatan"]');

            mfeNim.setAttribute('value', nim);
            mfeNama.setAttribute('value', nama);
            mfeTelp.setAttribute('value', telp);
            mfeAngkatan.setAttribute('value', angkatan);


            mfe.setAttribute('action', `<?= base_url('ujian/editMahasiswa/' . $kelas['id'] ) ?>/${id_mahasiswa}/?tahun=${pilihanAngkatan}`);
        })
    });


    const deleteButton = document.getElementById('deleteButton');

    deleteMahasiswa.forEach(dm => {

        dm.addEventListener('click', function() {
            let id_mahasiswa = this.parentElement.dataset.idmahasiswa;
            deleteButton.setAttribute('href', `<?= base_url('ujian/hapusmahasiswa/' . $kelas['id']); ?>/${id_mahasiswa}/${pilihanAngkatan}`)
        });
    });
</script>