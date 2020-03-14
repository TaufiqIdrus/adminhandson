<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage User
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>user/insert" class="mb-2 mr-2 btn btn-primary">Insert User</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Level</th>
                            <th>Insert Date</th>
                            <th>Last Update</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->id_user . "</td>";
                            echo "<td>" . $row->username . "</td>";
                            echo "<td>" . $row->emailaddress . "</td>";
                            echo "<td>" . $row->level . "</td>";
                            echo "<td>" . $row->insert_date . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="user/delete_user/<?= $row->id_user ?>" class="badge badge-danger ">Delete</a>
                                <a href="user/update/<?= $row->id_user ?>" class="badge badge-success ">Update</a>
                                <a href="user/detail/<?= $row->id_user ?>" class="badge badge-primary ">Profile</a>
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
</div>