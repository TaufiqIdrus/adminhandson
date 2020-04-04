<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Soal Quiz
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>quiz/insertsoal/<?= $id_kursus ?>" class="mb-2 mr-2 btn btn-primary">Insert Soal</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="float-right">
                    <a href="<?= base_url() ?>quiz/arsip_soal/<?= $id_kursus ?>" class="btn btn-primary"><i class="fas fa-archive fa-xs text-white rounded "></i> Arsip</a>
                    <div class="divider"></div>
                </div>
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Text soal</th>
                            <th>Pilihan jawaban</th>
                            <th>Jawaban benar</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($soal as $row) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->soal_quiz ?></td>
                                <td>
                                    <?php
                                    $pilihan = $this->m_quiz->display_pilihan($row->id_soal);
                                    if ($pilihan == null) {
                                        echo 'Belum ada pilihan jawaban';
                                    } else {
                                        foreach ($pilihan as $pilih) {
                                            echo $pilih->jawaban_quiz . '<br>';
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row->id_jawaban == null) {
                                        echo 'Jawaban benar belum dipilih';
                                    } else {
                                        echo $this->m_quiz->display_jawaban($row->id_jawaban);
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>quiz/delete_soal/<?= $row->id_soal ?>?id_kursus=<?= $id_kursus ?>" class="badge badge-danger mb-2">Hapus soal</a><br>
                                    <a href="<?= base_url() ?>quiz/updatesoal/<?= $row->id_soal ?>?id_kursus=<?= $id_kursus ?>" class="badge badge-warning mb-2">update soal</a><br>
                                    <a href="<?= base_url() ?>quiz/gantijawaban/<?= $row->id_soal ?>?id_kursus=<?= $id_kursus ?>" class="badge badge-success mb-2">Ganti jawaban benar</a><br>
                                    <a href="<?= base_url() ?>quiz/managepilihan/<?= $row->id_soal ?>?id_kursus=<?= $id_kursus ?>" class="badge badge-primary mb-2">Manage pilihan jawaban</a><br>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>