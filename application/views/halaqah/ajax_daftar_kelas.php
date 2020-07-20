<?php $i = 1; ?>
<?php foreach ($daftar_kelas as $dk) : ?>
    <tr>
        <td> <?= $i; ?> </th>
        <td><?= $dk['kelas']; ?></td>
        <td><?= $dk['anggota']; ?></td>
        <td>
            <a href="<?= base_url('halaqah/daftarmahasiswa/' . $tahun . '/' . $dk['id']); ?>" class="badge badge-primary">Pilih</a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>