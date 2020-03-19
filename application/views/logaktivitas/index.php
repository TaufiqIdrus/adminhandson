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
                            <th>No Log</th>
                            <th>No User</th>
                            <th>username</th>
                            <th>Login Time</th>
                            <th>Logout Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($logaktivitas as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->id_log . "</td>";
                            echo "<td>" . $row->id_user . "</td>";
                            echo "<td>" . $row->username . "</td>";
                            echo "<td>" . $row->login_time . "</td>";
                            echo "<td>" . $row->logout_time . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>