<?php $i = 1; ?>
<?php foreach ($daftar_kelas as $dk) : ?>
    <tr>
        <td> <?= $i; ?> </th>
        <td><?= $dk['kelas']; ?></td>
        <td><?= $dk['anggota']; ?></td>
        <td>
            <div class="row">
                <a href="<?= base_url('nilai/nilaikelas/' . $angkatan . '/' . $dk['id']); ?>" class="btn btn-primary  btn-sm">Lihat Nilai</a>
                <a href="<?= base_url('nilai/print_nilai/' . $angkatan . '/' . $dk['id']); ?>" class="btn btn-danger  btn-sm ml-2" target="_blank"> <i class="fa fa-print"></i> Print</a>
                <!-- <div class="dropdown ml-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCetakButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cetak
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownCetakButton">
                        <a href="<?= base_url('nilai/print_nilai/' . $angkatan . '/' . $dk['id']); ?>" class="dropdown-item" target="_blank"> <i class="fa fa-print"></i> Print</a>

                        <a href="<?= base_url('nilai/pdf_nilai/' . $angkatan . '/' . $dk['id']); ?>" class="btn-sm dropdown-item" target="_blank"> <i class="fa fa-file"></i> Export PDF</a>

                        <a href="<?= base_url('nilai/excel_nilai/' . $angkatan . '/' . $dk['id']); ?>" class=" dropdown-item" target="_blank"> <i class="fa fa-file-excel"></i> Export Excel</a>
                    </div>
                </div> -->
            </div>

        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>