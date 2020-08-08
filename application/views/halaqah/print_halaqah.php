<html>

<head>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('assets/'); ?>/img/favicomatic/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>/img/favicomatic/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>/img/favicomatic/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>/img/favicomatic/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>/img/favicomatic/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>/img/favicomatic/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <title>Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?> Kelas <?= $kelas['kelas']; ?> Semester <?= $kelas['semester'] . '/' . $tahun; ?></title>
    <style type="text/css">
        .style4 {
            font-size: 9px
        }

        .style6 {
            font-size: 10px
        }

        .style7 {
            font-size: 16px
        }
    </style>
</head>

<body>
    <div id="isi">
        <table width="210mm" height="296mm" border="0" align="center">
            <tbody>
                <tr>
                    <td width="210mm" height="296mm">
                        <table width="580" border="0" align="center">

                            <tbody>


                                <tr>
                                    <td rowspan="2" scope="row"><img src="<?= base_url('assets/'); ?>img/logo-unm.png" width="85" height="85"></td>
                                    <td colspan="4" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">
                                        <div align="center" class="style7">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br />
                                            UNIVERSITAS NEGERI MAKASSAR<br />
                                            UNIT PELAKSANA TEKNIS MATA KULIAH UMUM<br />
                                            BADAN PELAKSANA SAINS
                                        </div>
                                    </td>
                                    <td rowspan="2" scope="row"><img src="<?= base_url('assets/'); ?>img/logo-bps.png" width="85" height="85"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style=" font-family:Times New Roman; font-size:11pt; color:#000000;" align="center">
                                        <div align="center"><span class="style6">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</span></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="6" scope="row">
                                        <hr color="black" alt="" width="578" height="1" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="580" border="0" align="center">
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                        <table width="580" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td colspan="6" scope="row" align="center" style=" font-family:Times New Roman; font-size:14pt; color:#000000;" width="580">
                                        Daftar Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td width="100">Semester/Tahun</td>
                                    <td width="400">: <?= $kelas['semester'] . '/' . $tahun; ?></td>
                                    <td width="30">&nbsp;</td>
                                    <td width="30">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="100">Fakultas</td>
                                    <td width="400">: <?= $kelas['fakultas']; ?></td>
                                    <td width="20">&nbsp;</td>
                                    <td width="20">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="100">Prodi</td>
                                    <td width="400">: <?= $kelas['prodi']; ?></td>
                                    <td width="20">&nbsp;</td>
                                    <td width="20">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="100">Kelas</td>
                                    <td width="400">: <?= $kelas['kelas']; ?></td>
                                    <td width="20">&nbsp;</td>
                                    <td width="20">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="580" border="0" align="center">
                            <tbody>
                                <tr>
                                    <br>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        foreach ($halaqah as $h) : ?>
                            <table width="580" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td width="100">Tutor</td>
                                        <td width="400">: <?= $h['nama']; ?></td>
                                        <td width="30">&nbsp;</td>
                                        <td width="30">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="100">No. Telp</td>
                                        <td width="400">: <?= $h['telp']; ?></td>
                                        <td width="20">&nbsp;</td>
                                        <td width="20">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="100">Halaqah</td>
                                        <td width="400">: <?= $h['level']; ?></td>
                                        <td width="20">&nbsp;</td>
                                        <td width="20">&nbsp;</td>
                                    </tr>

                                </tbody>
                            </table>
                            <table width="580" border="1" align="center" style="border-collapse: collapse;">
                                <thead>
                                    <tr class="border">
                                        <th align="center" style="padding: 5;" width="80">No</th>
                                        <th scope="col" width="150">Nim</th>
                                        <th scope="col" width="260">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($mahasiswa as $mhs) : ?>
                                        <?php if ($mhs['id_halaqah'] == $h['id']) : ?>
                                            <tr>
                                                <td align="center" style="padding: 5;"><?= $i; ?></td>
                                                <td style="padding-left: 8;"><?= $mhs['nim']; ?></td>
                                                <td style="padding-left: 8;"><?= $mhs['nama']; ?></td>
                                            </tr>
                                    <?php $i++;
                                        endif;
                                    endforeach; ?>
                                </tbody>
                            </table>
                            <table width="580" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <br>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                        <table width="580" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <b> Catatan </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li></li>
                                    </td>
                                    <td>
                                        Harap perwakilan halaqah menelpon tutor masing-masing untuk menentukan jadwal pekanannya
                                    </td>
                                </tr>
                                <tr height="">
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <li></li>
                                    </td>
                                    <td>
                                        Pertemuan pekanan antara senin sampai jum'at
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // window.print();
    </script>
</body>

</html>