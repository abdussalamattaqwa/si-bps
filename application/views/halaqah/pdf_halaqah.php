<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?> Kelas <?= $kelas['kelas']; ?> Semester <?= $kelas['semester'] . '/' . $tahun; ?></title>


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        @page {
            size: A4;
            font-size: 12pt;
            position: relative;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .header {
            /* width: 21cm; */
            /* margin: 3cm; */
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
        }

        .header img.logo-bps {
            right: 0;
        }

        /* .isi {
            width: 21cm; 
             margin: 0 3cm;
        } */

        table {
            width: 100%;
            /* border: 2px solid black; */
        }

        .table thead th,
        .table tbody td {
            border: solid 1px black;
        }

        .isi {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>

    <div class="text-gray-900">
        <div class="header">
            <img src="assets/img/logo-unm.png" alt="" class="logo-unm">
            <p>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</p>
            <p>UNIVERSITAS NEGERI MAKASSAR (UNM)</p>
            <p>UNIT PELAKSANA TEKNIS MATA KULIAH UMUM</p>
            <p>BADAN PELAKSANA SAINS</p>
            <p class="h12" style="margin-top: -6px;">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</p>
            <img src="assets/img/logo-bps.png" alt="" class="logo-bps">
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

        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>