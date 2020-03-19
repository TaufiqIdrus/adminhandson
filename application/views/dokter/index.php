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
                    <a href="<?= base_url() ?>dokter/insert" class="mb-2 mr-2 btn btn-primary">Insert Dokter</a>
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
                        foreach ($dokter as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->id_dokter . "</td>";
                            echo "<td>" . $row->dokter . "</td>";
                            echo "<td>" . $row->spesialis . "</td>";
                            echo "<td>" . $row->rating . "</td>";
                            echo "<td>" . $row->insert_date . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="dokter/delete_dokter/<?= $row->id_dokter ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                <a href="dokter/update/<?= $row->id_dokter ?>" class="badge badge-success ">Update</a>
                                <a href="dokter/detail/<?= $row->id_dokter ?>" class="badge badge-primary ">Detail</a>

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