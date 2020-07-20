<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pertemuan</th>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jum'at</th>
                            <th>Sabtu</th>
                            <th>Ahad</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Pertemuan</th>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jum'at</th>
                            <th>Sabtu</th>
                            <th>Ahad</th>
                        </tr>
                    </tfoot>
                    <tbody style="font-size: 12px;">
                        <?php for ($i = 1; $i <= 14; $i++) : ?>
                            <tr class="tabel_row">
                                <td><?= $i; ?></td>

                                <?php for ($j = 1; $j <= 7; $j++) : ?>

                                    <!-- data 11 -->
                                    <td class="tabel_kolom" data-toggle="modal" data-target="#exampleModal" data-baris="<?= $i; ?>" data-kolom="<?= $j; ?>" class="list-group-item-action"><?php
                                                                                                                                                                                                    if (count($baca) != 0) :
                                                                                                                                                                                                        foreach ($baca as $b) :
                                                                                                                                                                                                            if ($b['baris_kolom'] == $i . $j) :
                                                                                                                                                                                                                echo $b['awal_surah'] . ': ' . $b['awal_ayat'] . ' - ' . $b['akhir_surah'] . ': ' . $b['akhir_ayat'];
                                                                                                                                                                                                            endif;
                                                                                                                                                                                                        endforeach;
                                                                                                                                                                                                        ?>
                                        <?php endif; ?>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h5>Awal Bacaan</h5>
                <label for="">Surah</label>
                <select name="awal_surah" id="awal_surah" class="custom-select">
                    <?php foreach ($quran as $q) : ?>
                        <option value="<?= $q['nama_surah']; ?>" data-ayat=<?= $q['jumlah_ayat']; ?>><?= $q['nama_surah'] . ' (' . $q['no_surah'] . ')'; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="">Ayat</label>
                <select name="awal_ayat" id="awal_ayat" class="custom-select">
                </select>

                <br>
                <hr><br>
                <h5>Akhir Bacaan</h5>
                <label for="">Surah</label>
                <select name="akhir_surah" id="akhir_surah" class="custom-select">
                    <?php foreach ($quran as $q) : ?>
                        <option value="<?= $q['nama_surah']; ?>" data-ayat=<?= $q['jumlah_ayat']; ?>><?= $q['nama_surah'] . ' (' . $q['no_surah'] . ')'; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="">Ayat</label>
                <select name="akhir_ayat" id="akhir_ayat" class="custom-select">

                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_data">Save changes</button>
            </div>
        </div>
    </div>
</div>