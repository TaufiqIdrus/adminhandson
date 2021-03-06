<div class="app-main__outer">
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
                            <th>Tersedia Untuk</th>
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
                            echo "<td>" . $row->tersedia_untuk . "</td>";
                            echo "<td>" . $row->jumlah_tersedia . "</td>";
                            echo "<td>" . $row->expired_date . "</td>";
                            if ($row->tersedia_untuk == "kursus") { ?>
                                <td><a href="voucher_k/manage_kursus/<?= $row->id_voucher ?>" class="badge badge-primary">Manage</a></td>
                            <?php } else if ($row->tersedia_untuk == "kategori") { ?>
                                <td><a href="voucher_k/manage_kategori/<?= $row->id_voucher ?>" class="badge badge-primary">Manage</a></td>
                            <?php } else { ?>
                                <td>Tersedia untuk semua kursus</td>
                        <?php  }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>