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
                    <a href="user/insert"><img src="<?php echo base_url();?>assets/img/icons/insert.png" width="50" height="50"></a>
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
                            <th>Email Address</th>
                            <th>Level</th>
                            <th>Insert Date</th>
                            <th>Last Update</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($user as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row->username . "</td>";
                            echo "<td>" . $row->emailaddress . "</td>";
                            echo "<td>" . $row->level . "</td>";
                            echo "<td>" . $row->insert_date . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="user/delete_user/<?=$row->id_user?>"><img src="<?php echo base_url();?>assets/img/icons/delete_user.png" width="30" height="30"></a>
                                <a href="user/update/<?=$row->id_user?>"><img src="<?php echo base_url();?>assets/img/icons/edit.png" width="30" height="30"></a>
                                <a href="user/detail/<?=$row->id_user?>"><img src="<?php echo base_url();?>assets/img/icons/profile.png" width="30" height="30"></a>
                            </td>
                        <?php
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>