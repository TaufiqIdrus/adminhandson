<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Voucher
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="voucher/insert" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>voucher/arsip/" class="btn btn-primary"><i class="fas fa-archive fa-xs text-white rounded "></i> Arsip</a>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Voucher</th>
                            <th>Potongan</th>
                            <th>Jumlah Tersedia</th>
                            <th>Expired Date</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($voucher as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->kode_voucher . "</td>";
                            echo "<td>" . $row->potongan . "</td>";
                            echo "<td>" . $row->jumlah_tersedia . "</td>";
                            echo "<td>" . $row->expired_date . "</td>";
                        ?>
                            <td>
                                <a href="voucher/delete_voucher/<?= $row->id_voucher ?>"><i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                <a href="voucher/update/<?= $row->id_voucher ?>"><i class="fas fa-edit fa-xs text-white p-2 bg-warning rounded"></i></a>

                            </td>
                        <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>