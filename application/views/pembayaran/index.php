<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Pembayaran
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>ID User</th>
                                <th>ID Kursus</th>
                                <th>Nominal</th>
                                <th>Waktu Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <?php
                            foreach ($pembayaran as $row) {
                                echo "<tr>";
                                echo "<td>" . $row->transaction_id . "</td>";
                                echo "<td>" . $row->id_user . "</td>";
                                echo "<td>" . $row->id_kursus . "</td>";
                                echo "<td>" . $row->nominal . "</td>";
                                echo "<td>" . $row->transaction_time . "</td>";
                                echo "<td>" . $row->transaction_status . "</td>";
                            ?>
                            <!-- <td>
                                    <a href="pembayaran/detail/<?= $row->transaction_id ?>" class="badge badge-primary ">Detail</a>
                            </td> -->
                            <?php
                                echo "</tr>";
                            }
                            ?>
                        </tbody> -->
                    </table>
            </div>
        </div>
    </div>
</div>