<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $kelas['prodi']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
            <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $kelas['kelas']; ?>" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?= ($user['jk'] == 'L') ? 'Ikhwah' : 'Akhwat'; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="level" class="col-sm-2 col-form-label">Halaqah</label>
        <div class="col-sm-6">
            <input type="text" name="level" id="level" class="form-control" value="<?= $halaqah['level']; ?>" readonly>
        </div>
    </div>
    <br>
    <h3>Daftar Nilai</h3>
    <br>

    <button class="btn btn-primary text-gray-100 mb-3" data-toggle="modal" data-target="#tambahModal">Tambah Mahasiswa</button>
    <?= $this->session->flashdata('message'); ?>
    <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= form_error('nim', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= form_error('telp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center">Nim</th>
                            <th rowspan="2" class="text-center">Nama</th>
                            <th rowspan="2" class="text-center">Telp</th>
                            <th rowspan="2" class="text-center"><a href="<?= base_url('binaan/isinilai/kehadiran/' . $halaqah['id']); ?>" class="btn btn-primary btn-sm">Kehadiran <br> (45%) </a></th>
                            <th rowspan=" 2" class="text-center"><a href="<?= base_url('binaan/isinilai/mid/' . $halaqah['id']); ?>" class="btn btn-primary btn-sm"> Mid <br> (15%) </a></th>
                            <th rowspan="2" class="text-center"><a href="<?= base_url('binaan/isinilai/final_test/' . $halaqah['id']); ?>" class="btn btn-primary btn-sm">Final <br> (30%) </a></th>
                            <th rowspan="2" class="text-center"><a href="<?= base_url('binaan/isinilai/tugas/' . $halaqah['id']); ?>" class="btn btn-primary btn-sm">Tugas <br> (10%)</a></th>
                            <th colspan="2" class="text-center">Akhir</th>
                            <th rowspan="2" class="text-center">Aksi</th>

                        </tr>
                        <tr>
                            <th>Angka</th>
                            <th>Huruf</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($mahasiswa as $mhs) : ?>

                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $mhs['nim']; ?></td>
                                <td><?= $mhs['nama']; ?></td>
                                <td><?= $mhs['telp']; ?></td>
                                <td><?= $mhs['kehadiran']; ?></td>
                                <td><?= $mhs['mid']; ?></td>
                                <td><?= $mhs['final_test']; ?></td>
                                <td><?= $mhs['tugas']; ?></td>
                                <td><?= $mhs['akhir']; ?></td>
                                <td><?= $mhs['huruf']; ?></td>
                                <td data-id="<?= $mhs['idmhs']; ?>"><a href="" class="btn btn-success btn-sm edit-mahasiswa" data-toggle="modal" data-target="#editModal"><i class="fas fa-fw fa-edit"></i> Edit</a> <a href="" class="btn btn-danger btn-sm hapus-mahasiswa" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-fw fa-trash"></i> Delete</a></td>

                            </tr>
                        <?php
                            $i++;
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



<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="NIM" name="nim">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Telephone" name="telp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
                </div>
            </form>

        </div>
    </div>
</div>





<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="editForm">
                <div class="modal-body">

                    Nim
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="NIM" name="nim">
                    </div>

                    Nama
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Nama" name="nama">
                    </div>
                    Telephone
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Telephone" name="telp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Mahasiswa</button>
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
                <a class="btn btn-danger" id="deleteButton" style="color: white;">Hapus</a>
            </div>
        </div>
    </div>
</div>


<script>
    const hapusmahasiswa = document.querySelectorAll('.hapus-mahasiswa');
    const deleteButton = document.getElementById('deleteButton');

    hapusmahasiswa.forEach(function(h) {
        h.addEventListener('click', function() {
            let idMahasiswa = this.parentElement.dataset.id;
            // console.log(idMahasiswa);
            deleteButton.setAttribute('href', `<?= base_url("binaan/hapusmahasiswa/" . $halaqah['id']) ?>/${idMahasiswa}`);
        });
    })


    const editMahasiswa = document.querySelectorAll('.edit-mahasiswa');
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');
    const mfeNim = editModal.querySelector('input[name="nim"]');
    const mfeNama = editModal.querySelector('input[name="nama"]');
    const mfeTelp = editModal.querySelector('input[name="telp"]');

    editMahasiswa.forEach(function(em) {
        em.addEventListener('click', function() {
            let idMahasiswa = this.parentElement.dataset.id;
            let telp = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
            let nama = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
            let nim = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;

            mfeNama.setAttribute('value', nama);
            mfeNim.setAttribute('value', nim);
            mfeTelp.setAttribute('value', telp);

            editForm.setAttribute('action', `<?= base_url('binaan/editmahasiswa/' . $halaqah['id']) ?>/${idMahasiswa}`);
        });
    });
</script>