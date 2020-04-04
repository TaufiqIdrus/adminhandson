<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Pilihan Jawaban
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>quiz/insertjawaban/<?= $id_soal ?>?id_kursus=<?= $id_kursus ?>" class="mb-2 mr-2 btn btn-primary">Insert Jawaban</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="float-right">
                    <a href="<?= base_url() ?>quiz/arsip_pilihan/<?= $id_soal ?>?id_kursus=<?= $id_kursus ?>" class="btn btn-primary"><i class="fas fa-archive fa-xs text-white rounded "></i> Arsip</a>
                    <div class="divider"></div>
                </div>
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Text Jawaban</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($jawaban as $row) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->jawaban_quiz ?></td>
                                <td>
                                    <a href="<?= base_url() ?>quiz/delete_jawaban/<?= $row->id_jawaban ?>?id_kursus=<?= $id_kursus ?>&id_soal=<?= $id_soal ?>"> <i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                    <a href="<?= base_url() ?>quiz/updatejawaban/<?= $row->id_jawaban ?>?id_kursus=<?= $id_kursus ?>&id_soal=<?= $id_soal ?>"><i class="fas fa-edit fa-xs text-white p-2 bg-warning rounded"></i></a>
                                </td>
                            </tr>

                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>