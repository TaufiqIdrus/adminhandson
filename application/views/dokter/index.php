<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Tabel Dokter
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                <a href="dokter/insert"><img src="<?php echo base_url();?>assets/img/icons/insert.png" width="50" height="50"></a>  
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama dokter</th>
                            <th>Spesialis</th>
                            <th>Rating</th>
                            <th>Insert date</th>
                            <th>Last update</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($dokter as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row->dokter . "</td>";
                            echo "<td>" . $row->spesialis . "</td>";
                            echo "<td>" . $row->rating . "</td>";
                            echo "<td>" . $row->insert_date . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="dokter/delete_dokter/<?=$row->id_dokter?>"><img src="<?php echo base_url();?>assets/img/icons/delete_user.png" width="35" height="35"></a>
                                <a href="dokter/update/<?=$row->id_dokter?>"><img src="<?php echo base_url();?>assets/img/icons/edit.png" width="35" height="35"></a>
                                <a href="dokter/detail/<?=$row->id_dokter?>"><img src="<?php echo base_url();?>assets/img/icons/profile.png" width="35" height="35"></a>
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