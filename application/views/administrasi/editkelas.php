<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>


    <div class="form-group row">
        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
        <div class="col-sm-6">
            <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= $prodi['fakultas']; ?>" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-6">
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $prodi['jurusan']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-6">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $prodi['prodi']; ?>" readonly>
        </div>
    </div>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Modal">Tambah Kelas</a>

    <div class="row">
        <div class="col-lg-8">
            <table class="table table-hover text-gray-900 ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_kelas as $dk) : ?>
                        <tr>
                            <th scope="row"> <?= $i; ?> </th>
                            <td><?= $dk['kelas']; ?></td>
                            <td>
                                <a href="" class="badge badge-success editKelas" data-toggle="modal" data-target="#modalEdit" data-id="<?= $dk['id']; ?>" data-kelas="<?= $dk['kelas']; ?>">Edit</a>

                                <a href="" class="badge badge-danger deleteKelas" data-toggle="modal" data-target="#hapusModal" data-id="<?= $dk['id']; ?>" data-anggota=<?= $dk['anggota']; ?>>Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class=" modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal-Labely" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Labely">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('administrasi/tambahKelas/' . $prodi['id']); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="formInput form-control form-control-user" name="fakultas" value="<?= $prodi['fakultas']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="formInput form-control form-control-user" name="jurusan" value="<?= $prodi['jurusan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="formInput form-control form-control-user" name="prodi" value="<?= $prodi['prodi']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="formInput form-control form-control-user" name="kelas">
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
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="Modal-Edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-Edit">Edit Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="modal-form" action="<?= base_url('administrasi/editKelas/' . $prodi['id']); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="formId form-control form-control-user" name="id">
                        <input type="text" class="formKelas form-control form-control-user" name="kelas">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn-modal btn btn-primary">Edit Kelas</button>
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
                <h6> Apakah anda yakin ingin menghapus kelas ini ?</h6>
                <div class="pesan"></div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                <a class="btn btn-danger" id="deleteButton" style="color: white;">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const editKelas = document.querySelectorAll('.editKelas');
    const edtFormId = document.querySelector('.formId ');
    const edtFormKelas = document.querySelector('.formKelas');
    for (eKelas of editKelas) {
        eKelas.addEventListener('click', function() {
            edtFormId.setAttribute('value', this.dataset.id);
            edtFormKelas.setAttribute('value', this.dataset.kelas);
        })
    }

    const btnHapus = document.getElementById('deleteButton');


    const deleteKelas = document.querySelectorAll('.deleteKelas');
    for (dKelas of deleteKelas) {
        dKelas.addEventListener('click', function() {

            const pesan = document.querySelector('.pesan');
            pesan.innerHTML = '';
            let anggota = this.dataset.anggota;

            if (anggota > 0) {
                pesan.innerHTML = `
                    <div class="alert alert-danger">Semua data <b>mahasiswa</b> dikelas ini akan terhapus</div>

                    <div class="alert alert-warning">Terdapat <b>${anggota} mahasiswa</b> dikelas ini yang akan terhapus</div>
                `;

            }
            btnHapus.setAttribute('href', `<?= base_url("administrasi/hapusKelas/"); ?> ${dKelas.dataset.id}/<?= $prodi['id']; ?>/${anggota}`)
        });
    }
</script>