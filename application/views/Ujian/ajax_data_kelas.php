<?php $i = 1; ?>
<?php foreach ($kelas as $dk) : ?>
    <tr>
        <th scope="row"> <?= $i; ?> </th>
        <td><?= $dk['kelas']; ?></td>
        <td><?= $dk['anggota']; ?></td>
        <td>
            <a href="<?= base_url('ujian/mahasiswa/' . $dk['id'] . '?tahun=' . $angkatan); ?>" class="badge badge-primary pilih_kelas">Pilih</a>
        </td>

    </tr>
    <?php $i++; ?>
<?php endforeach; ?>