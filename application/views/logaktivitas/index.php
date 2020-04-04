<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Tabel Log Aktivitas
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
                            <th>No</th>
                            <th>Username</th>
                            <th>Controller</th>
                            <th>Method</th>
                            <th>Activity</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1;
                        foreach ($logaktivitas as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->username . "</td>";
                            echo "<td>" . $row->controller . "</td>";
                            echo "<td>" . $row->method . "</td>";
                            echo "<td>" . $row->activity . "</td>";
                            echo "<td>" . $row->time . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>