<!DOCTYPE html>
<html lang="en">

<head>

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
        <table border="0" align="center" style="border-spacing: -1px; ">
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
            <tr height="18">
                <td><br></td>
            </tr>
            <tr>
                <td colspan="18" align="center">
                    <div style=" font-family:Times New Roman; font-size:14pt; color:#000000;">Daftar Halaqah <?= ($jk == 'L') ? 'Ikhwah' : 'Akhwat'; ?></div>
                </td>
            </tr>

            <tr height="18">
                <td></td>
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
                    <td></br></td>
                </tr>
                <tr height="13">
                    <td><br></td>
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
                    <th scope="col" colspan="10" width="180">Nama</th>
                </tr>
                <?php
                $i = 1;
                foreach ($mahasiswa as $mhs) : ?>
                    <?php if ($mhs['id_halaqah'] == $h['id']) : ?>
                        <tr class="border">
                            <td align="center"><?= $i; ?></td>
                            <td colspan="2"><?= $mhs['nim']; ?></td>
                            <td colspan="10"><?= $mhs['nama']; ?></td>
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
                <td colspan="18">
                    <b> Catatan </b>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 13pt;">
                    <li></li>
                </td>
                <td colspan="17" width="240">
                    Harap perwakilan halaqah menelpon tutor masing-masing untuk menentukan jadwal pekanannya
                </td>
            </tr>
            <tr height="">
                <td></td>
            </tr>
            <tr>
                <td>
                    <li style="padding-left: 13pt;"></li>
                </td>
                <td colspan="17" width="240">
                    Pertemuan pekanan antara senin sampai jum'at
                </td>
            </tr>
        </table>

    </div>

    <script>
        // window.print();
    </script>
</body>

</html>