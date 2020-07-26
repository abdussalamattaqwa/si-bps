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


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        @page {
            size: A4;
            font-size: 12pt;
            /* position: relative; */
            margin: auto;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .header {
            width: 23cm;
            margin: auto;
            margin-bottom: 0;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            line-height: 10px;
            font-size: 14pt;
            margin-top: 5px;
            position: relative;
        }

        .header p:nth-child(1) {
            font-size: 16pt;
        }

        .header .h12 {
            font-size: 12pt;
        }

        .header img {
            top: -12px;
            width: 3cm;
            position: absolute;
        }

        .header img.logo-unm {
            left: 0;
            margin-left: 30px;
        }

        .header img.logo-bps {
            right: 0;
            margin-right: 30px;
        }


        .isi {
            width: 21cm;
            margin: auto;
            font-family: 'Times New Roman', Times, serif;
        }

        .table thead th,
        .table tbody td {
            border: solid 1px black !important;
        }

        @media print {
            .isi {
                color: black !important;
            }

            .table {
                color: black !important;
            }
        }
    </style>
</head>

<body>

    <div class="text-gray-900">
        <div class="header">
            <img src="<?= base_url('assets/'); ?>img/logo-unm.png" alt="" class="logo-unm">
            <p>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</p>
            <p>UNIVERSITAS NEGERI MAKASSAR (UNM)</p>
            <p>UNIT PELAKSANA TEKNIS MATA KULIAH UMUM</p>
            <p>BADAN PELAKSANA SAINS</p>
            <p class="h12" style="margin-top: -6px;">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</p>
            <img src="<?= base_url('assets/'); ?>img/logo-bps.png" alt="" class="logo-bps">
            <hr>

        </div>




        <div class="isi">
            <h2 class="text-center">Daftar Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?></h2>
            <table>
                <tr>
                    <td style="width: 150px;">Semester/tahun</td>
                    <td>: <?= $kelas['semester'] . '/' . $tahun; ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>: <?= $kelas['fakultas']; ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>: <?= $kelas['jurusan']; ?></td>
                </tr>

                <tr>
                    <td>Prodi</td>
                    <td>: <?= $kelas['prodi']; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: <?= $kelas['kelas']; ?></td>
                </tr>
            </table>

            <br>
            <?php
            foreach ($halaqah as $h) : ?>

                <table>
                    <tr>
                        <td style="width: 150px;">Tutor</td>
                        <td>: <?= $h['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>No.Telp</td>
                        <td>: <?= $h['telp']; ?></td>
                    </tr>
                    <tr>
                        <td>Halaqah</td>
                        <td>: <?= $h['level']; ?></td>
                    </tr>
                </table>

                <table class="text-gray-900 table table-bordered" style="width: 700px;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 80px;">No</th>
                            <th scope="col" style="width: 250px;">Nim</th>
                            <th scope="col">Nama</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($mahasiswa as $mhs) : ?>
                            <?php if ($mhs['id_halaqah'] == $h['id']) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $mhs['nim']; ?></td>
                                    <td><?= $mhs['nama']; ?></td>
                                </tr>
                        <?php $i++;
                            endif;

                        endforeach; ?>

                    </tbody>
                </table>
                <br>
            <?php endforeach; ?>
            <b> Catatan </b>
            <ul>
                <li> Harap perwakilan halaqah menelpon tutor masing-masing untuk menentukan jadwal pekanannya</li>
                <li> Pertemuan pekanan antara senin sampai jum'at</li>
            </ul>


        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>