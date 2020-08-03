<?php $i = 1; ?>
<?php foreach ($daftar_kelas as $dk) : ?>
    <tr>
        <td> <?= $i; ?> </th>
        <td><?= $dk['kelas']; ?></td>
        <td><?= $dk['anggota']; ?></td>
        <td>
            <a href="<?= base_url('halaqah/daftarmahasiswa/' . $tahun . '/' . $dk['id']); ?>" class="btn btn-primary btn-sm"> <i class="fas fa-fw fa-mouse-pointer"></i> Pilih</a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>