<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Ketersediaan Voucher
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>voucher_k/insertkursus/<?= $id_voucher ?>" class="mb-2 mr-2 btn btn-primary">Insert Kursus</a>
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
                            <th>Judul Kursus</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kursus as $row) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $this->m_voucher->display_nama_kursus($row->id_kursus) ?></td>
                                <td>
                                    <a href="<?= base_url() ?>voucher_k/delete/<?= $row->id_ket ?>"> <i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>