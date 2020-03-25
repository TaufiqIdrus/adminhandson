<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Arsip Bab Video Kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>babkursus/" class="btn btn-secondary">kembali</a>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Bab Kursus</th>
                            <th>Kursus</th>
                            <th>Tanggal Arsip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($babkursus as $row) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->bab_kursus ?></td>
                                <td><?= $this->m_babkursus->display_kursus($row->id_kursus) ?></td>
                                <td><?= $row->last_update ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>