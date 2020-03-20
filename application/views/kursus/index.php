<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Tabel Kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="kursus/insert"><img src="<?php echo base_url();?>assets/img/icons/insert.png" width="50" height="50"></a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi Singkat</th>
                            <th>Harga</th>
                            <th>Last Update</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($kursus as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->deskripsi_singkat . "</td>";
                            echo "<td>" . $row->harga . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                            <a href="kursus/delete_kursus/<?=$row->id_kursus?>"><img src="<?php echo base_url();?>assets/img/icons/delete.png" width="30" height="30"></a>
                            <a href="kursus/update/<?=$row->id_kursus?>"><img src="<?php echo base_url();?>assets/img/icons/update.png" width="30" height="30"></a>
                            <a href="kursus/detail/<?=$row->id_kursus?>"><img src="<?php echo base_url();?>assets/img/icons/detail.png" width="30" height="30"></a>
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