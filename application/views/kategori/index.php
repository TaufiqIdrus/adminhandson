<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Tabel Kategori
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="kategori/insert"><img src="<?php echo base_url();?>assets/img/icons/insert.png" width="50" height="50"></a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Insert By</th>
                            <th>Insert Date</th>
                            <th>Last Update</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($kategori as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row->kategori . "</td>";
                            echo "<td>" . $row->deskripsi . "</td>";
                            echo "<td>" . $row->insert_by . "</td>";
                            echo "<td>" . $row->insert_date . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="kategori/delete_kategori/<?=$row->id_kategori?>"><img src="<?php echo base_url();?>assets/img/icons/delete.png" width="30" height="30"></a>
                                <a href="kategori/update/<?=$row->id_kategori?>"><img src="<?php echo base_url();?>assets/img/icons/update.png" width="30" height="30"></a>

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