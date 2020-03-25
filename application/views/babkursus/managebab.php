<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Bab Video Kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>babkursus/insertbab/<?= $id_kursus ?>" class="mb-2 mr-2 btn btn-primary">Insert Bab</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>babkursus" class="btn btn-secondary">kembali</a>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Bab Kursus</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($babkursus as $row) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->bab_kursus ?></td>
                                <td>
                                    <a href="<?= base_url() ?>babkursus/delete_bab/<?= $row->id_bab ?>?id_kursus=<?= $id_kursus ?>"> <i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                    <a href="<?= base_url() ?>babkursus/updatebab/<?= $row->id_bab ?>?id_kursus=<?= $id_kursus ?>"><i class="fas fa-edit fa-xs text-white p-2 bg-warning rounded"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>