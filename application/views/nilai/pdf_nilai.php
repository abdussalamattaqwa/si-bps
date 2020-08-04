<!DOCTYPE html>
<html lang="en">

<head>



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

        .border th,
        .border td {
            border: solid 1px black;
            padding: 5pt 3pt;
        }

        /* --> */
    </style>
</head>

<body>
    <div id="isi">
        <table align="center" style="border-spacing: -1px;">
            <tr>
                <td colspan="2" scope="row" align="center"><img src="assets/img/logo-unm.png" width="90" height="90"></td>
                <td colspan="14" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">
                    <div align="center" class="style7">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br />
                        UNIVERSITAS NEGERI MAKASSAR<br />
                        UNIT PELAKSANA TEKNIS MATA KULIAH UMUM<br />
                        BADAN PELAKSANA SAINS<br />
                        <div align="center"><span class="style6">Sekretariat : Masjid Ulil Albab Parang Tambung UNM, Makassar. KP. 90220 Telp. 085255549154</span></div>
                    </div>
                </td>
                <td colspan="2" scope="row"><img src="assets/img/logo-bps.png" width="90" height="90"></td>
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
                    <div style=" font-family:Times New Roman; font-size:14pt; color:#000000;">Daftar Nilai SAINS</div>
                </td>
            </tr>

            <tr height="18">
                <td></td>
            </tr>

            <tr>
                <td scope="row" colspan="3">Semester/Tahun</td>
                <td colspan="14" align="left">: <?= $kelas['semester'] . '/' . $tahun; ?></td>
            </tr>
            <tr>
                <td scope="row" colspan="3">Fakultas</td>
                <td colspan="14" align="left">: <?= $kelas['fakultas']; ?></td>
            </tr>
            <tr>
                <td scope="row" colspan="3">Prodi</td>
                <td colspan="14" align="left">: <?= $kelas['prodi']; ?></td>
            </tr>
            <tr>
                <td scope="row" colspan="3">Kelas</td>
                <td colspan="14" align="left">: <?= $kelas['kelas']; ?></td>
            </tr>
            <tr height="13">
                <td><br></br></td>
            </tr>

            <tr class="border" style="margin-top: 2px;">
                <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">No</th>
                <th rowspan="2" colspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Nim</th>
                <th rowspan="2" colspan="7" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Nama</th>
                <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">JK</th>
                <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Kehadiran <br> (45%) </th>
                <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Mid <br> (15%) </th>
                <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Final <br> (30%) </th>
                <th rowspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Tugas <br> (10%)</th>
                <th colspan="2" align="center" style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Akhir</th>
            </tr>
            <tr class="border">
                <th style=" font-family:Times New Roman; font-size:12pt; color:#000000;">Angka</th>
                <th style=" font-family:Times New Roman; font-size:12pt; color:#000000; border: solid 1px black">Huruf</th>
            </tr>


            <?php
            $i = 1;
            foreach ($mahasiswa as $mhs) : ?>

                <tr class="border">
                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000; padding: 7pt;"><?= $i; ?></td>

                    <td colspan="2" align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['nim']; ?></td>

                    <td colspan="7" style="font-family:Times New Roman; font-size:12pt; color:#000000; padding-left: 3pt;"><?= $mhs['nama']; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['jk']; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['kehadiran'] != null) ? $mhs['kehadiran'] : '0'; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['mid'] != null) ? $mhs['kehadiran'] : '0'; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['final_test'] != null) ? $mhs['kehadiran'] : '0'; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= ($mhs['tugas'] != null) ? $mhs['kehadiran'] : '0'; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['akhir']; ?></td>

                    <td align="center" style="font-family:Times New Roman; font-size:12pt; color:#000000;"><?= $mhs['huruf']; ?></td>
                </tr>
            <?php
                $i++;
            endforeach; ?>



        </table>
    </div>
</body>

</html>