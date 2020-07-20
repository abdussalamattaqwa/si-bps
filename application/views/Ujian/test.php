<style>
    .form-check .form-check-input {
        width: 25px;
        height: 25px;
    }
</style>


<!-- Begin Page Content -->
<div class="container-fluid text-gray-900">

    <!-- Page Heading -->
    <h1 class="h3 mb-4">
        <?php if ($test == 'pre_test') {
            echo "Pre Test SAINS UNM";
        } else {
            echo "Final Test SAINS UNM";
        } ?>
    </h1>

    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
            <input type="text" id="nama" class=" form-control" value="<?= $mahasiswa['nama']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-6">
            <input type="text" id="kelas" class=" form-control" value="<?= $kelas['kelas']; ?>" readonly>
        </div>
    </div>


    <br>

    <form method="post" action="<?= base_url('ujian/input_test/' . $test . '/' . $proses . '/' . $kelas['id'] . '/' . $mahasiswa['angkatan'] . '/' . $mahasiswa['id']); ?>">
        <div class="row">
            <div class="col-lg-5">
                <h4 class="text-gray-900">Kesalahan Makhrajul Huruf (35%) </h4>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-gradient-primary text-gray-100">Makhraj</th>
                            <th scope="col" class="bg-gradient-danger text-gray-100">Kesalahan</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                        <tr>
                            <td>ا (alif)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>ب (ba)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ت (ta)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ث (tsa)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ج (ja)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ح (ha)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>خ (kho)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>د (da)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ذ (dza)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ر (ra)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ز (za)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>س (sa)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ش (sya)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ص (sho)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ض (dho)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ط (tho)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ظ (zho)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ع (ain)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>غ (gho)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ف (fa)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ق (qa)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ك (ka)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ل (la)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>م (ma)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ن (na)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>و (wa)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ه (hah)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ي (ya)</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="makhraj[]">
                                    </div>
                                </div>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="col-lg-7">
                <h4 class="text-gray-900">Bacaan Surah</h4>
                <br>
                <div class="form-group row">
                    <label for="tajwid" class="col-sm-3 col-form-label">Tajwid (50%)</label>

                    <div>
                        <input type="number" id="tajwid" class="form-control" name="tajwid">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="kelancaran" class="col-sm-3 col-form-label">Kelancaran (15%)</label>
                    <div>
                        <input type="number" id="kelancaran" class="form-control" name="kelancaran">
                    </div>
                </div>

                <br>
                <div class="row col-sm-8">
                    <button type="submit" class="btn-modal btn btn-primary btn-block">
                        Simpan
                    </button>
                    &nbsp &nbsp
                    <!-- <button type="submit" class="btn-modal btn btn-secondary right">
                    Kembali
                </button> -->
                </div>
            </div>
        </div>
    </form>
    <br>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->