<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto" style="font-size: 9px;">
            <span>Developer by <i class="fab fa-instagram"></i> @abdussalam_attaqwa</span> <br>
            <br>
            <span>Pendidikan Teknik Informatika dan Komputer Angkatan 2016 FT UNM</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<script>
    if (screen.width < 615) {
        // let
        // console.log('okoko');

        document.body.classList.toggle('sidebar-toggled');

        const wrapper = document.querySelector('#wrapper .navbar-nav');
        wrapper.classList.toggle('toggled');
    }

    $('.editUser').on('click', function() {
        let nama = $(this).data('nama');
        let email = $(this).data('email');
        let role_id = $(this).data('role');
        let idUser = $(this).data('iduser');
        console.log(idUser);

        let username = $(this).data('username');
        $('#idUser').attr('value', idUser);
        $('#name').attr('value', nama);
        $('#email').attr('value', email);
        $('#username').attr('value', username);
        $('#role_id option[value=\"' + role_id + '\"]').attr('selected', 'selected');
    });

    $('.deleteUser').on('click', function() {
        let idUser = $(this).data('iduser');
        let nama = $(this).data('nama');
        $('.idUser').attr('value', idUser);
        $('.teksHapus').html('Pilih tombol "hapus" jika anda ingin menghapus user <b style="color: blue;">' + nama + '</b> ini.');

    });
</script>
</body>

</html>