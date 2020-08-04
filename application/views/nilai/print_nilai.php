<!DOCTYPE html>
<html lang="en">

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
        /* <!-- */
        .style4 {
            font-size: 9px
        }

        .style6 {
            font-size: 11px
        }

        .style7 {
            font-size: 16px
        }

        .style8 {
            font-size: 12pt;
            color: #000000;
        }

        .style9 {
            font-size: 14px;
            font-weight: bold;
        }

        .style10 {
            font-size: 14px
        }

        body {
            margin: 0;
            padding: 0;
        }

        /* --> */
    </style>
</head>

<body>
    <div id="isi">
        <table width="210mm" height="296mm" border="0" align="center">
            <tr>
                <td width="210mm" height="296mm">
                    <table width="584" border="0" align="center">
                        <tr>
                            <td rowspan="2" scope="row" style="padding-left: 10pt;"><img src="<?= base_url('assets/'); ?>img/logo-unm.png" width="90" height="90"></td>
                            <td colspan="4" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">
                                <div align="center" class="style7">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br />
                                    UNIVERSITAS NEGERI MAKASSAR<br />
                                    UNIT PELAKSANA TEKNIS MATA KULIAH UMUM<br />
                                    BADAN PELAKSANA SAINS
                                </div>
                            </td>
                            <td rowspan="2" scope="row"><img src="<?= base_url('assets/'); ?>img/logo-bps.png" width="90" height="90"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">
                                <div align="center"><span class="style6">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</span></div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6" scope="row">
                                <hr color="black" alt="" width="650" height="1" />
                            </td>
                        </tr>
                        <td width="137" align="center" colspan="6"><span style=" font-family:Times New Roman; font-size:14pt; color:#000000;">Daftar Nilai SAINS</span></td>

                        <tr>
                            <td scope="row">Semester/Tahun</td>
                            <td align="right">: </td>
                            <td colspan="2"><?= $kelas['semester'] . '/' . $tahun; ?></td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <div align="left" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Fakultas</div>
                            </td>
                            <td align="right">: </td>
                            <td colspan="2">
                                <div align="left" style=" font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $kelas['fakultas']; ?></div>
                            </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <div align="left" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Prodi</div>
                            </td>
                            <td align="right">: </td>
                            <td colspan="2">
                                <div align="left" style=" font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $kelas['prodi']; ?></div>
                            </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <div align="left" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Kelas</div>
                            </td>
                            <td align="right">: </td>
                            <td colspan="2">
                                <div align="left" style=" font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $kelas['kelas']; ?></div>
                            </td>
                            <td> </td>
                        </tr>

                    </table></br>
                    <table width="650" border="1" align="center" style="border-collapse: collapse; ">
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
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>