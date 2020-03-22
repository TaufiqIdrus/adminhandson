<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="kursus/insert" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
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
                        <?php $i = 1;
                        foreach ($kursus as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->deskripsi_singkat . "</td>";
                            echo "<td>Rp." .number_format($row->harga, 0, ",", "."). "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="kursus/delete_kursus/<?=$row->id_kursus?>"><i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                <a href="kursus/update/<?=$row->id_kursus?>"><i class="fas fa-edit fa-xs text-white p-2 bg-warning rounded"></i></a>
                                <a href="kursus/detail/<?=$row->id_kursus?>"><i class="fas fa-info-circle fa-xs text-white p-2 bg-primary rounded"></i></a>
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