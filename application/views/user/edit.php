<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>

            <input type="hidden" value="<?= $id_user; ?>" name="id_user">
            <input type="hidden" value="<?= $input; ?>" name="input">

            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= $user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= $user['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">
                    Picture
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" onchange="tampilGambar()">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($status != 'user') { ?>
                <div class="form-group row">
                    <?php if ($status == 'dosen') { ?>
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="<?= $user['nip']; ?>">
                        </div>
                    <?php } else { ?>
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM" value="<?= $user['nim']; ?>">
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">No. Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="No. Telephone" value="<?= $user['telp']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="<?= $user['alamat']; ?>">
                    </div>
                </div>
            <?php } ?>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function tampilGambar() {

        const inputImgProfile = document.getElementById('image');
        const labelImgProfile = inputImgProfile.nextElementSibling;
        const imgPreview = document.querySelector('.img-preview');

        let namaFile = inputImgProfile.files[0]['name']
        labelImgProfile.textContent = namaFile;

        const oFReader = new FileReader();
        oFReader.readAsDataURL(inputImgProfile.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>