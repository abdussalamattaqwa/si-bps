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
    <title>Nilai Kelas <?= $kelas['kelas'] . ' Semester ' . $kelas['semester'] . '/' . $tahun; ?></title>

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
                                        Daftar Nilai SAINS
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
                                    <td width="60" height="4" scope="row">
                                        <div align="center" class="style6">
                                            <div align="left" style=" font-family:Times New Roman; font-size:6pt; color:#000000;">
                                                <!-- <br> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td width="54" style=" font-family:Times New Roman; font-size:12pt; color:#000000;"><br></td>
                                    <td width="324" class="style6">&nbsp;</td>
                                    <td width="89" class="style6">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="580" border="1" align="center" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000; padding: 12pt 0pt;">No</th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Nim</th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Nama</th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">JK</th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Kehadiran <br> (45%) </th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Mid <br> (15%) </th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Final <br> (30%) </th>
                                    <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Tugas <br> (10%)</th>
                                    <th colspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Akhir</th>

                                </tr>
                                <tr>
                                    <th style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Angka</th>
                                    <th style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Huruf</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($mahasiswa as $mhs) : ?>

                                    <tr>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000; padding: 7pt;"><?= $i; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['nim']; ?></td>
                                        <td width="30px" style="font-family:Times New Roman; font-size:12pt; color:#000000; padding-left: 3pt;"><?= $mhs['nama']; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['jk']; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['kehadiran'] != null) ? $mhs['kehadiran'] : '0'; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['mid'] != null) ? $mhs['mid'] : '0'; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['final_test'] != null) ? $mhs['final_test'] : '0'; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['tugas'] != null) ? $mhs['tugas'] : '0'; ?></td>

                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['akhir']; ?></td>
                                        <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000; "><?= $mhs['huruf']; ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                endforeach; ?>

                            </tbody>
                        </table>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>