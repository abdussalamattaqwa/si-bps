<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nilai Kelas <?= $kelas['kelas'] . ' Semester ' . $kelas['semester'] . '/' . $tahun; ?>; </title>


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        @page {
            size: A4;
            font-size: 11pt;
            position: relative;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .header {
            /* width: 21cm; */
            /* margin: 3cm; */
            /* margin-bottom: 0; */
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
            font-size: 11pt;
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
            <img src="assets/img/logo-bps.png" alt="" class="logo-bps">
            <p>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</p>
            <p>UNIVERSITAS NEGERI MAKASSAR (UNM)</p>
            <p>UNIT PELAKSANA TEKNIS MATA KULIAH UMUM</p>
            <p>BADAN PELAKSANA SAINS</p>
            <p class="h12">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</p>
            <hr style="margin-bottom: -15px;">
        </div>




        <div class="isi mt-3">


            <h3 class="text-center">Daftar Nilai SAINS </h3>

            <table>
                <tr>
                    <td>Semester/Tahun</td>
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

            <div class="row">
                <div class="col-lg-11">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" style="top: -30px;">No</th>
                                <th rowspan="2" class="text-center">Nim</th>
                                <th rowspan="2" class="text-center">Nama</th>
                                <th rowspan="2" class="text-center">JK</th>
                                <th rowspan="2" class="text-center">Kehadiran <br> (45%) </th>
                                <th rowspan=" 2" class="text-center">Mid <br> (15%) </th>
                                <th rowspan="2" class="text-center">Final <br> (30%) </th>
                                <th rowspan="2" class="text-center">Tugas <br> (10%)</th>
                                <th colspan="2" class="text-center">Akhir</th>

                            </tr>
                            <tr>
                                <th>Angka</th>
                                <th>Huruf</th>

                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($mahasiswa as $mhs) : ?>

                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $mhs['nim']; ?></td>
                                    <td width="30px"><?= $mhs['nama']; ?></td>
                                    <td><?= $mhs['jk']; ?></td>
                                    <td><?= ($mhs['kehadiran'] != null) ? $mhs['kehadiran'] : '0'; ?></td>
                                    <td><?= ($mhs['mid'] != null) ? $mhs['kehadiran'] : '0'; ?></td>
                                    <td><?= ($mhs['final_test'] != null) ? $mhs['kehadiran'] : '0'; ?></td>
                                    <td><?= ($mhs['tugas'] != null) ? $mhs['kehadiran'] : '0'; ?></td>

                                    <td><?= $mhs['akhir']; ?></td>
                                    <td><?= $mhs['huruf']; ?></td>


                                </tr>
                            <?php
                                $i++;
                            endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>

</html>