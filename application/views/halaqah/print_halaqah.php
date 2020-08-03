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
    <title>Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?> Kelas <?= $kelas['kelas']; ?> Semester <?= $kelas['semester'] . '/' . $tahun; ?></title>

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

        .border th,
        .border td {
            border: solid 1px black;
            padding: 8pt 3pt;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }

        @page {
            size: A4;
        }

        /* --> */
    </style>
</head>

<body>
    <div id="isi" width="210mm">
        <table border="0" align="center" style="border-spacing: -1px; border-collapse: collapse;">
            <tr>
                <td colspan="2" scope="row" align="center"><img src="<?= base_url('assets/'); ?>img/logo-unm.png" width="77" height="77"></td>
                <td colspan="14" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">
                    <div align="center" class="style7">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br />
                        UNIVERSITAS NEGERI MAKASSAR<br />
                        UNIT PELAKSANA TEKNIS MATA KULIAH UMUM<br />
                        BADAN PELAKSANA SAINS<br />
                        <div align="center"><span class="style6">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</span></div>
                    </div>
                </td>
                <td colspan="2" scope="row"><img src="<?= base_url('assets/'); ?>img/logo-bps.png" width="77" height="77"></td>
            </tr>
            <tr>
                <td colspan="18" scope="row">
                    <hr color="black" alt="" height="1" />
                </td>
            </tr>
            <tr height="10">
                <td></td>
            </tr>

            <tr>
                <td colspan="18" align="center">
                    <div style=" font-family:Times New Roman; font-size:14pt; color:#000000;">Daftar Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?></div>
                </td>
            </tr>

            <tr height="18">
                <td><br></td>
            </tr>

            <tr>
                <td scope="row" colspan="2">Semester/Tahun</td>
                <td colspan="14" align="left">: <?= $kelas['semester'] . '/' . $tahun; ?></td>
            </tr>
            <tr>
                <td scope="row" colspan="2">Fakultas</td>
                <td colspan="14" align="left">: <?= $kelas['fakultas']; ?></td>
            </tr>
            <tr>
                <td scope="row" colspan="2">Prodi</td>
                <td colspan="14" align="left">: <?= $kelas['prodi']; ?></td>
            </tr>
            <tr>
                <td scope="row" colspan="2">Kelas</td>
                <td colspan="14" align="left">: <?= $kelas['kelas']; ?></td>
            </tr>

            <?php
            foreach ($halaqah as $h) : ?>
                <tr height="18">
                    <td></td>
                </tr>
                <tr>
                    <td scope="row" colspan="2">Tutor</td>
                    <td colspan="14" align="left">: <?= $h['nama']; ?></td>
                </tr>
                <tr>
                    <td scope="row" colspan="2">No. Telp</td>
                    <td colspan="14" align="left">: <?= $h['telp']; ?></td>
                </tr>
                <tr>
                    <td scope="row" colspan="2">Halaqah</td>
                    <td colspan="14" align="left">: <?= $h['level']; ?></td>
                </tr>



                <tr class="border">
                    <th scope="col" align="center" width="20">No</th>
                    <th scope="col" colspan="2" width="50">Nim</th>
                    <th scope="col" colspan="2" width="100">Nama</th>
                </tr>
                <?php
                $i = 1;
                foreach ($mahasiswa as $mhs) : ?>
                    <?php if ($mhs['id_halaqah'] == $h['id']) : ?>
                        <tr class="border">
                            <td align="center"><?= $i; ?></td>
                            <td colspan="2"><?= $mhs['nim']; ?></td>
                            <td colspan="2"><?= $mhs['nama']; ?></td>
                        </tr>
                <?php $i++;
                    endif;

                endforeach; ?>

            <?php endforeach; ?>
            <tr height="13">
                <td><br></td>
            </tr>
            <tr height="13">
                <td><br></td>
            </tr>
            <tr>
                <td colspan="16">
                    <b> Catatan </b>
                </td>

            </tr>
            <tr>
                <td>
                    <li></li>
                </td>
                <td colspan="17" width="180">
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
                <td colspan="17" width="180">
                    Pertemuan pekanan antara senin sampai jum'at
                </td>
            </tr>
        </table>

    </div>

    <script>
        window.print();
    </script>
</body>

</html>