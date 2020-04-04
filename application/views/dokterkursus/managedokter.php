<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Dokter Pengajar Kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>dokterkursus/insertdokter/<?= $id_kursus ?>" class="mb-2 mr-2 btn btn-primary">Insert Dokter Pengajar</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter Pengajar Kursus</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($dokterkursus as $row) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $this->m_dokterkursus->displaynamadokter($row->id_dokter);  ?></td>
                                <td>
                                    <a href="<?= base_url() ?>dokterkursus/delete_dokter/<?= $row->id_dokterkursus ?>?id_kursus=<?= $id_kursus ?>"> <i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>