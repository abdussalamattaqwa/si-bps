<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; BPS UNM 2020</span> <br> <br>
            <span>Developer by @abdussalam_attaqwa</span>
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

<script>
    $('.form-check-input-role-access').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input-role-access').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });


    $('.tabel_kolom').on('click', function() {

        ulangAyat('awal');
        ulangAyat('akhir');

        $('#awal_surah').click(function() {
            ulangAyat('awal');
        });

        $('#akhir_surah').click(function() {
            ulangAyat('akhir');
        });
        let b = $(this).data('baris');
        let k = $(this).data('kolom');
        let baris_kolom = b.toString() + k;
        let id_user = <?= $user['id']; ?>;
        // console.log(id_user);

        let isi = $(this).text().split(' - ');


        if (isi.length <= 1) {
            $('.save_data').on('click', function() {
                // console.log('okokokoko');
                awal_surah = $('#awal_surah').val();
                awal_ayat = $('#awal_ayat').val();
                akhir_surah = $('#akhir_surah').val();
                akhir_ayat = $('#akhir_ayat').val();

                $.ajax({
                    url: "<?= base_url('quran/masukkan_bacaan'); ?>",
                    type: 'post',
                    data: {
                        awal_surah: awal_surah,
                        awal_ayat: awal_ayat,
                        akhir_surah: akhir_surah,
                        akhir_ayat: akhir_ayat,
                        baris_kolom: baris_kolom,
                        id_user: id_user
                    },
                    success: function() {
                        document.location.href = "<?= base_url('quran'); ?>";
                    }
                });
            });
        } else {
            $('option').removeAttr('selected');
            let awal_baca = isi[0].split(': ');
            let akhir_baca = isi[1].split(': ');

            let awal_surah = awal_baca[0];
            let awal_ayat = awal_baca[1];
            let akhir_surah = akhir_baca[0];
            let akhir_ayat = akhir_baca[1];

            $('#awal_surah option[value=\"' + awal_surah + '\"').attr('selected', 'selected');
            $('#awal_ayat option[value=\"' + awal_ayat + '\"').attr('selected', 'selected');
            $('#akhir_surah option[value=\"' + akhir_surah + '\"').attr('selected', 'selected');
            $('#akhir_ayat option[value=\"' + parseInt(akhir_ayat).toString() + '\"').attr('selected', 'selected');
            $('.save_data').text('Update Data');
            $('.modal-footer').remove('.delete_data');
            $('.modal-footer').append('<button type = \"button\" class = \"btn btn-danger save_data delete_data\"> Delete </button>')

            $('.save_data').on('click', function() {
                awal_surah = $('#awal_surah').val();
                awal_ayat = $('#awal_ayat').val();
                akhir_surah = $('#akhir_surah').val();
                akhir_ayat = $('#akhir_ayat').val();
                $.ajax({
                    url: "<?= base_url('quran/update_bacaan'); ?>",
                    type: 'post',
                    data: {
                        awal_surah: awal_surah,
                        awal_ayat: awal_ayat,
                        akhir_surah: akhir_surah,
                        akhir_ayat: akhir_ayat,
                        baris_kolom: baris_kolom,
                        id_user: id_user
                    },
                    success: function() {
                        document.location.href = "<?= base_url('quran'); ?>";
                    }
                });
            });

            $('.delete_data').on('click', function() {
                console.log('okokokokok');
                $.ajax({
                    url: "<?= base_url('quran/delete_bacaan'); ?>",
                    type: 'post',
                    data: {
                        baris_kolom: baris_kolom,
                        id_user: id_user
                    },
                    success: function() {
                        document.location.href = "<?= base_url('quran'); ?>";
                    }
                });
            });

        }
    });

    function ulangAyat(pilihan) {
        awal_surah = $('#' + pilihan + '_surah').val();
        $('#' + pilihan + '_ayat').empty();
        jumlah_ayat = $('#awal_surah option[value=\"' + awal_surah + '\"]').data('ayat');

        for (let index = 1; index <= jumlah_ayat; index++) {
            $('#' + pilihan + '_ayat').append('<option value=\"' + index + '\">' + index + '</option>');
        }
    }

    // script logbook
    // $('.tabel_kolom').on('click', function()
    // $('.editSubMenu').on('click', function() {
    //     let b = $(this).data('id');
    //     console.log(b);

    // });

    // script admin/role
    // $('.editRole').on('click', function() {
    //     let b = $(this).data('id');
    //     console.log(b);


    // });
</script>


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
</script>

</body>

</html>