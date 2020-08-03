<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-gray-900 tbody" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nama</th>
                        <?php if ($jk == 'semua')
                            echo '<th scope="col">JK</th>' ?>
                        <th scope="col">Tutor</th>
                        <th scope="col">Anggota</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <?php $i = 1;
                foreach ($halaqah as $h) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $h['kelas']; ?></td>
                        <td><?= $h['level']; ?></td>
                        <?php if ($jk == 'semua')
                            echo '<td>' . $h['jk'] . '</td>' ?>
                        <td><?= $h['nama']; ?></td>
                        <td>
                            <?= $h['jumlah_anggota']; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('halaqah/daftarmahasiswa/' . $tahun . '/' . $h['id_kelas']); ?>?jk=<?= $h['jk']; ?>" class="btn btn-success btn-sm"><i class="fas fa-fw fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>