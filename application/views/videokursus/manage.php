<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage video kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
               
                <a href="<?= base_url() ?>videokursus/insert/<?=$id_kursus?>" class="mb-2 mr-2 btn btn-primary">Insert Video</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">

            <div class="card-body">
                <a href="<?= base_url() ?>videokursus" class="btn btn-secondary">Kembali</a>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Video</th>
                            <th>URL Video</th>
                            <th>Durasi</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($video as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->id_video . "</td>";
                            echo "<td>" . $row->judul_video . "</td>";
                            echo "<td>" . $row->url_video . "</td>";
                            echo "<td>" . $row->durasi . "</td>";
                        ?>
                            <td>
                            <a href="videokursus/delete_video/<?=$row->id_video?>"><img src="<?php echo base_url();?>assets/img/icons/delete.png" width="30" height="30"></a>
                            <a href="videokursus/update/<?=$row->id_video?>"><img src="<?php echo base_url();?>assets/img/icons/update.png" width="30" height="30"></a>
                
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