<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Arsip Voucher
                        <div class="page-title-subheading">
                        </div>
                    </div>
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
                            <th>Kode Voucher</th>
                            <th>Potongan</th>
                            <th>Jumlah Tersedia</th>
                            <th>Expired Date</th>
                            <th>Tanggal Arsip</th>
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
                            echo "<td>" . $row->last_update . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>