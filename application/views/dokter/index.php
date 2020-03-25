<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Dokter
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="dokter/insert" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>dokter/arsip/" class="btn btn-primary"><i class="fas fa-archive fa-xs text-white rounded "></i> Arsip</a>
                <div class="divider"></div>
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
                        <?php $i = 1;
                        foreach ($dokter as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->dokter . "</td>";
                            echo "<td>" . $row->spesialis . "</td>";
                            echo "<td>" . $row->rating . "</td>";
                            echo "<td>" . $row->insert_date . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="dokter/delete_dokter/<?= $row->id_dokter ?>"><i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                <a href="dokter/update/<?= $row->id_dokter ?>"><i class="fas fa-edit fa-xs text-white p-2 bg-warning rounded"></i></a>
                                <a href="dokter/detail/<?= $row->id_dokter ?>"><i class="fas fa-info-circle fa-xs text-white p-2 bg-primary rounded"></i></a>
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